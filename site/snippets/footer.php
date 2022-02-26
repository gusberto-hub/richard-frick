</div>
<?php if(page('Shop')->isOpen()): ?>
<script async src="https://cdn.snipcart.com/themes/v3.2.1/default/snipcart.js"></script>
<div hidden id="snipcart" data-api-key="ODc1ZTJmODUtNWU5Ni00YzEyLWI1ODQtZWZkMmMwODk1ZWUzNjM3NzAzMzYwMTMyMDQwMjQx
        ">

    <item-line tag="<string>" item="<CartItem>" showDescription="false">
        <div class="root">
            <li :class="{'snipcart-item-line': true, 'snipcart-item-line--cart-edit': editingCart}">
                <flash-message type="info" icon="box" v-if="stockLimitReached"
                    :title="$localize('errors.quantity_revised')"></flash-message>
                <flash-message type="error" icon="box" v-if="outOfStock"
                    :title="$localize('errors.quantity_out_of_stock')"></flash-message>
                <div class="snipcart-item-line__container">
                    <figure class="snipcart-item-line__media" v-if="showLargeImage">
                        <item-image class="snipcart-item-line__image"></item-image>
                    </figure>
                    <figure class="snipcart-item-line__media snipcart-item-line__media--small" v-if="showSmallImage">
                        <item-image class="snipcart-item-line__image"></item-image>
                    </figure>
                    <div class="snipcart-item-line__product">
                        <div class="snipcart-item-line__header">

                            <h2
                                class="snipcart-item-line__title snipcart__font--xlarge snipcart__font--secondary snipcart__font--black">
                                {{ item.name }}
                            </h2>

                            <button-icon icon="trash" label="item.remove_item" styling="danger" @click="removeItem">
                            </button-icon>
                        </div>

                        <div class="snipcart-item-line__content">
                            <div class="snipcart-item-line__body">
                                <!-- <div class="snipcart-item-line__info">
                                    <item-description v-if="showDescription"></item-description>
                                </div> -->
                                <div class="snipcart-item-line__variants">
                                    <div>
                                        <item-plans :item="item" v-if="!adding && isSubscribable"></item-plans>
                                        <item-custom-fields v-if="!adding"></item-custom-fields>
                                    </div>
                                    <item-quantity class="snipcart-item-line__quantity"
                                        v-if="!adding && !isSubscribable" :disabled="outOfStock || isSubscribable">
                                    </item-quantity>
                                    <div class="snipcart-form__field snipcart-form__field--plan snipcart-form__field--plan--billed-on"
                                        v-if="isSubscribable && !adding">
                                        <span class="snipcart-form__label snipcart__font--tiny">
                                            {{$localize('subscription.payment_amount')}}
                                        </span>
                                        <div class="snipcart-form__field--plan__readonly">
                                            <item-price :item="item" :selected-plan="selectedPlan">
                                            </item-price>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </div>
    </item-line>
    <address-fields>
        <div>
            <fieldset class="snipcart-form__set">
                <div class="snipcart-form__row">
                    <div class="snipcart-form__field snipcart-form__cell--large">
                        <snipcart-label class="snipcart__font--tiny" for="address1">
                            {{ $localize('address_form.address1') }}</snipcart-label>
                        <snipcart-input name="address1"></snipcart-input>
                        <snipcart-error-message name="address1"></snipcart-error-message>
                    </div>

                    <div class="snipcart-form__field snipcart-form__cell--tidy">
                        <snipcart-label class="snipcart__font--tiny" for="address2">
                            {{ $localize('address_form.address2') }}</snipcart-label>
                        <snipcart-input name="address2">
                        </snipcart-input>
                        <snipcart-error-message name="address2"></snipcart-error-message>
                    </div>
                </div>

                <div class="snipcart-form__field">
                    <snipcart-label class="snipcart__font--tiny" for="city">{{ $localize('address_form.city') }}
                    </snipcart-label>
                    <snipcart-input name="city"></snipcart-input>
                    <snipcart-error-message name="city"></snipcart-error-message>
                </div>

                <div class="snipcart-form__field">
                    <snipcart-label class="snipcart__font--tiny" for="country">
                        {{ $localize('address_form.country') }}</snipcart-label>
                    <snipcart-typeahead type="dropdown" name="country" autocomplete="country"></snipcart-typeahead>
                </div>

                <div class="snipcart-form__row">
                    <div class="snipcart-form__field snipcart-form__cell--large">
                        <snipcart-label class="snipcart__font--tiny" for="province">
                            {{ $localize('address_form.province') }}</snipcart-label>
                        <snipcart-typeahead type="dropdown" name="province" autocomplete="province state">
                        </snipcart-typeahead>
                    </div>

                    <div class="snipcart-form__field snipcart-form__cell--tidy">
                        <snipcart-label class="snipcart__font--tiny" for="postalCode">
                            {{ $localize('address_form.postalCode') }}</snipcart-label>
                        <snipcart-input name="postalCode"></snipcart-input>
                        <snipcart-error-message name="postalCode"></snipcart-error-message>
                    </div>
                </div>
            </fieldset>
        </div>
    </address-fields>
</div>
<script>
document.addEventListener('snipcart.ready', function() {
    Snipcart.api.session.setLanguage('de', {
        address_form: {
            address2: "Adresszusatz"
        }
    });
});
</script>
<?php endif ?>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<?= Bnomei\Fingerprint::js('main/assets/js/scripts.js
    ');?>

</body>

</html>