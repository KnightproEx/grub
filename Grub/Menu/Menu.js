$(document).ready(function() {

  $.ajax({
    type: "POST",
    url: "Menu.php",

    success: function(json_result) {

      var result = JSON.parse(json_result);
      var item = new Array();

      if (result.invalid) {
        window.location.replace("../Home/HomePage.php");
      }

      for (var i=0; i < result.itemlist.length; i++) {
        item[i] = result.itemlist[i];
      }

      var board = document.querySelector('#board');
      var carousel = new Carousel(item, board);

    }

  });

});


var vue = new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  created: function() {
      $.ajax({
        type: "POST",
        url: "UnsetSession.php",
      })
  },

  data: () => ({
    drawer: false,
    cart_drawer: false,
    logout_dialog: false,
    headers: [
      {
        text: 'Item',
        align: 'start',
        sortable: false,
        value: 'name',
      },
      { text: 'Quantity', value: 'quantity' },
      { text: 'Actions', value: 'actions', sortable: false },
    ],
    cart: [],
    subtotal: 0,
  }),

  methods: {
    addItem(item) {
        var exist = false

        for (var i=0; i < this.cart.length; i++) {
            if (this.cart[i].id == item.id) {
                exist = true
                this.cart[i].quantity++
            }
        }

        if (!exist) {
            this.cart.push ({
                id: item.id,
                name: item.name,
                quantity: 1,
                price: item.price
            })
        }
    },

    incrementItem (item) {
      var index = this.cart.indexOf(item)
      this.cart[index].quantity ++
      this.updateTotal()
    },

    decrementItem (item) {
      var index = this.cart.indexOf(item)
      
      if (this.cart[index].quantity > 0) {
        this.cart[index].quantity -= 1
      }

      if(this.cart[index].quantity < 1) {
        this.cart.splice(this.cart.indexOf(item), 1)
      }

      this.updateTotal()
    },

    deleteItem (item) {
      this.cart.splice(this.cart.indexOf(item), 1)
      this.updateTotal()
    },

    updateTotal() {
        var subtotal = 0
        for (var i=0; i < this.cart.length; i++) {
            subtotal += parseFloat(this.cart[i].price) * parseFloat(this.cart[i].quantity)
        }
        this.subtotal = subtotal

        $.ajax({
            type: "POST",
            url: "Cart.php",
            data: JSON.stringify({cart: this.cart}),
        });
    },

    checkout() {
        $.ajax({
            type: "POST",
            url: "Checkout.php",
        });

        window.location.href = "../Login/LoginPage.php";
    }

  },

})


class Carousel {

    constructor(items, element) {

        this.index = 0;
        this.items = items;
        this.board = element;

        for (var i=0; i < items.length; i++) {
            this.push();
            this.handle();
        }

        if (items.length == 1) {
            this.push();
            this.handle();
        }

    }

    handle(direction) {

        if (direction == Hammer.DIRECTION_RIGHT) {
          vue.addItem(this.items[this.index]);
          vue.updateTotal();
        }

        // list all cards
        this.cards = this.board.querySelectorAll('.card')

        // get top card
        this.topCard = this.cards[this.cards.length - 1]

        // get next card
        this.nextCard = this.cards[this.cards.length - 2]

        // if at least one card is present
        if (this.cards.length > 0) {

            // set default top card position and scale
            this.topCard.style.transform =
                'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(1)'

            // destroy previous Hammer instance, if present
            if (this.hammer) this.hammer.destroy()

            // listen for tap and pan gestures on top card
            this.hammer = new Hammer(this.topCard)
            this.hammer.add(new Hammer.Tap())
            this.hammer.add(new Hammer.Pan({
                position: Hammer.position_ALL,
                threshold: 0
            }))

            // pass events data to custom callbacks
            this.hammer.on('tap', (e) => {
                this.onTap(e)
            })
            this.hammer.on('pan', (e) => {
                this.onPan(e)
            })

        }

        this.index++;
        this.index = this.index < this.items.length ? this.index : 0;

    }

    onTap(e) {

        // get finger position on top card
        let propX = (e.center.x - e.target.getBoundingClientRect().left) / e.target.clientWidth

        // get rotation degrees around Y axis (+/- 15) based on finger position
        let rotateY = 15 * (propX < 0.05 ? -1 : 1)

        // enable transform transition
        this.topCard.style.transition = 'transform 100ms ease-out'

        // apply rotation around Y axis
        this.topCard.style.transform =
            'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(' + rotateY + 'deg) scale(1)'

        // wait for transition end
        setTimeout(() => {
            // reset transform properties
            this.topCard.style.transform =
                'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(1)'
        }, 100)

    }

    onPan(e) {

        if (!this.isPanning) {

            this.isPanning = true

            // remove transition properties
            this.topCard.style.transition = null
            if (this.nextCard) this.nextCard.style.transition = null

            // get top card coordinates in pixels
            let style = window.getComputedStyle(this.topCard)
            let mx = style.transform.match(/^matrix\((.+)\)$/)
            this.startPosX = mx ? parseFloat(mx[1].split(', ')[4]) : 0
            this.startPosY = mx ? parseFloat(mx[1].split(', ')[5]) : 0

            // get top card bounds
            let bounds = this.topCard.getBoundingClientRect()

            // get finger position on top card, top (1) or bottom (-1)
            this.isDraggingFrom =
                (e.center.y - bounds.top) > this.topCard.clientHeight / 2 ? -1 : 1

        }

        // get new coordinates
        let posX = e.deltaX + this.startPosX
        let posY = e.deltaY + this.startPosY

        // get ratio between swiped pixels and the axes
        let propX = e.deltaX / this.board.clientWidth
        let propY = e.deltaY / this.board.clientHeight

        // get swipe direction, left (-1) or right (1)
        let dirX = e.deltaX < 0 ? -1 : 1

        // get degrees of rotation, between 0 and +/- 45
        let deg = this.isDraggingFrom * dirX * Math.abs(propX) * 45

        // get scale ratio, between .95 and 1
        let scale = (95 + (5 * Math.abs(propX))) / 100

        // move and rotate top card
        this.topCard.style.transform =
            'translateX(' + posX + 'px) translateY(' + posY + 'px) rotate(' + deg + 'deg) rotateY(0deg) scale(1)'

        // scale up next card
        if (this.nextCard) this.nextCard.style.transform =
            'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(' + scale + ')'

        if (e.isFinal) {

            this.isPanning = false

            let successful = false

            // set back transition properties
            this.topCard.style.transition = 'transform 200ms ease-out'
            if (this.nextCard) this.nextCard.style.transition = 'transform 100ms linear'

            // check threshold and movement direction
            if (propX > 0.25 && e.direction == Hammer.DIRECTION_RIGHT) {

                successful = true
                // get right border position
                posX = this.board.clientWidth

            } else if (propX < -0.25 && e.direction == Hammer.DIRECTION_LEFT) {

                successful = true
                // get left border position
                posX = -(this.board.clientWidth + this.topCard.clientWidth)

            }

            if (successful) {

                // throw card in the chosen direction
                this.topCard.style.transform =
                    'translateX(' + posX + 'px) translateY(' + posY + 'px) rotate(' + deg + 'deg)'

                // wait transition end
                setTimeout(() => {
                    // remove swiped card
                    this.board.removeChild(this.topCard)
                    // add new card
                    this.push()
                    // handle gestures on new top card
                    this.handle(e.direction)
                }, 200)

            } else {

                // reset cards position and size
                this.topCard.style.transform =
                    'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(1)'
                if (this.nextCard) this.nextCard.style.transform =
                    'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(0.95)'

            }

        }

    }

    push() {

        var items = this.items[this.index];

        // rendering card photo
        var card = document.createElement('div');
        card.style.backgroundImage = "url(" + items.image + ")";
        card.classList.add('card');

        // rendering card heading
        var heading = document.createElement("p");
        heading.innerHTML = items.name;
        heading.classList.add('heading');
        card.appendChild(heading);

        // rendering card description
        var description = document.createElement("p");
        description.innerHTML = items.description;
        description.classList.add('description');
        card.appendChild(description);

        // rendering card price
        var price = document.createElement("p");
        price.innerHTML = "RM " + items.price;
        price.classList.add('price');
        card.appendChild(price);

        this.board.insertBefore(card, this.board.firstChild);

    }

}
