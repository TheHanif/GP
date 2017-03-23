<template>
    <div class="row">
        <div class="col-sm-6 col-md-6" v-if="billing_details">
            <h2>{{ billingLable }} details</h2>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="billing[first_name]" class="label-control">First Name</label>
                        <input v-model="user.billing.first_name" class="form-control" name="billing[first_name]" type="text" id="billing[first_name]">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="billing[last_name]" class="label-control">Last Name</label>
                        <input v-model="user.billing.last_name" class="form-control" name="billing[last_name]" type="text" id="billing[last_name]">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="billing[email]" class="label-control">Email address</label>
                        <input v-model="user.billing.email" class="form-control" name="billing[email]" type="email" id="billing[email]">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="billing[mobile]" class="label-control">Mobile no.</label>
                        <input v-model="user.billing.mobile" class="form-control" name="billing[mobile]" type="text" id="billing[mobile]">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="billing[address]" class="label-control">Address</label>
                        <input v-model="user.billing.address" class="form-control" placeholder="Street address" name="billing[address]" type="text" id="billing[address]">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input v-model="user.billing.apartment" class="form-control" placeholder="Apartment, suite, unit etc. (Optional)" name="billing[apartment]" type="text">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="billing[city]" class="label-control">City</label>
                        <input v-model="user.billing.city" class="form-control" readonly="true" name="billing[city]" type="text" id="billing[city]">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="billing[area]" class="label-control">Area</label>
                        <input v-model="user.billing.area" class="form-control" name="billing[area]" type="text" id="billing[area]">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="billing[landmark]" class="label-control">Nearest Landmark</label>
                        <input v-model="user.billing.landmark" class="form-control" placeholder="Any nearest famous place" name="billing[landmark]" type="text" id="billing[landmark]">
                    </div>
                </div>
            </div>

            <a href="#" class="btn btn-info" @click.prevent="shipping_details = !shipping_details" :class="{active: shipping_details}">Change shipping details</a>
        </div>

        <div class="col-sm-6 col-md-6" v-if="shipping_details">
            <h2>Shipping details</h2>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="shipping[first_name]" class="label-control">First Name</label>
                        <input v-model="user.shipping.first_name" class="form-control" name="shipping[first_name]" type="text" id="shipping[first_name]">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="shipping[last_name]" class="label-control">Last Name</label>
                        <input v-model="user.shipping.last_name" class="form-control" name="shipping[last_name]" type="text" id="shipping[last_name]">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="shipping[email]" class="label-control">Email address</label>
                        <input v-model="user.shipping.email" class="form-control" name="shipping[email]" type="email" id="shipping[email]">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="shipping[mobile]" class="label-control">Mobile no.</label>
                        <input v-model="user.shipping.mobile" class="form-control" name="shipping[mobile]" type="text" id="shipping[mobile]">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="shipping[address]" class="label-control">Address</label>
                        <input v-model="user.shipping.address" class="form-control" placeholder="Street address" name="shipping[address]" type="text" id="shipping[address]">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input v-model="user.shipping.apartment" class="form-control" placeholder="Apartment, suite, unit etc. (Optional)" name="shipping[apartment]" type="text">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="shipping[city]" class="label-control">City</label>
                        <input v-model="user.shipping.city" class="form-control" readonly="true" name="shipping[city]" type="text" id="shipping[city]">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="shipping[area]" class="label-control">Area</label>
                        <input v-model="user.shipping.area" class="form-control" name="shipping[area]" type="text" id="shipping[area]">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="shipping[landmark]" class="label-control">Nearest Landmark</label>
                        <input v-model="user.shipping.landmark" class="form-control" placeholder="Any nearest famous place" name="shipping[landmark]" type="text" id="shipping[landmark]">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data(){
            return {
                labels: {
                        billing : 'Billing / Shipping'
                    },

                // If user has details
                user_details: true,
                billing_details: true,
                shipping_details: false,
                }
        },
        mounted() {
        },
        computed: {
            billingLable(){
                return this.shipping_details ? 'Billing' : 'Billing / Shipping';
            }
        }
    }
</script>
