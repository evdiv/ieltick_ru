<template>
    <div>
        <h4>Детали заказа</h4>

        <table class="table table-striped text-left">
          <tr>
              <td>Название</td>
              <td>Стоимость</td>
          </tr>
          <tr>
              <td>{{ product.title }}</td>
              <td>{{ product.price }}<small>.00 рублей</small></td>
          </tr>
        </table>
        
        <hr/>

        <h5>Оплатить с помошью карты Visa / MasterCard</h5>
        <small>Все транзакции защищены сервисом <a class='text-primary' href='https://stripe.com/'>Stripe</a></small>
        <StripeElements class='stripe-card'
          stripe='pk_live_DoCTByUq8dZ05ORCr9KLxByp'
          :product = 'product' 
          :options='stripeOptions'
          @change='complete = $event.complete' />

        <h5>Другие способы оплаты</h5>
        <slot name="paypal"></slot>

    </div>             
</template>

<script>

import StripeElements from './StripeElementsComponent'

export default {
    props: ['product'],
    data () {
        return {
            stripeOptions: {
                // see https://stripe.com/docs/stripe.js#element-options for details
                style: {
                    base: {
                        fontFamily: 'Verdana',
                        fontSize: '16px',
                        '::placeholder': {
                        color: '#CFD7E0',
                        }
                    }
                }
            }
        }
    },

    components: { StripeElements },

}
</script>