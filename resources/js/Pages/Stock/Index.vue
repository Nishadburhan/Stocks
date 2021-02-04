<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <!-- <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Welcome to your Stocks!
            </div> -->

            <div class="text-gray-500">
                
                <form @submit.prevent="getStock()" class="flex flex-row">
                    <!-- <vue-bootstrap-typeahead 
                   :data="skus"
                    v-model="skuSearch"
                    size="lg"
                    :serializer="s => s.text"
                    placeholder="Type an SKU..."
                    @hit="selectedSku = $event"
                /> -->
                <vue-bootstrap-typeahead 
                v-model="form.sku"
                :data="skus"
                @hit="selectedSku = $event"

                />

                <!-- <div> -->
                    <!-- <input type="text" class="ring-1 block rounded-md w-90 h-25" v-model="form.sku" placeholder="Search SKU/Code here.."> -->
                <!-- </div> -->
                <!-- <div> -->
                    <!-- <button class="bg-gray-600 hover:bg-gray-700 focus:outline-none text-white focus:ring-2 rounded-md w-90 h-25 ml-2 p-4 focus:ring-purple-600 focus:ring-opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                            </svg>
                    </button> -->
                <!-- </div> -->
               <!-- <form @submit.prevent="getStock()">
                        <input type="text" class="ring-1 block md:flex rounded-md w-90" v-model="form.sku" placeholder="Search SKU/Code here..">
                        <button class="bg-gray-600 hover:bg-gray-700 focus:outline-none text-white flex focus:ring-2 rounded-md w-90 h-35 p-4 focus:ring-purple-600 focus:ring-opacity-50">
                            Sign up
                        </button>
                </form> -->
                </form>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="ml-4 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <!-- META -->
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        OFFICE
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        DAS
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        01
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        02
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        TECHMATE
                                    </th>
                                    <!-- <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="product in products" :key="product.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                        <!-- <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                        </div> -->
                                            <div class="ml-4">
                                                <div class="text-2xl">
                                                    {{product.sku}}
                                                </div>
                                                <div class="text-sm font-medium text-gray-900">
                                                Total Stock
                                                </div>
                                                <div class="text-sm" v-bind:class="[product.totalStock <1 ? ' text-red-400' : ' text-gray-500 ']">
                                                {{product.totalStock}}
                                                </div>
                                                <div class="text-sm font-medium text-gray-900">
                                                Other Sales Rate
                                                </div>
                                                <div class="text-sm" v-bind:class="[product.otherSalesRate <1 ? ' text-red-400' : ' text-gray-500 ']">
                                                {{product.otherSalesRate}}
                                                </div>
                                                <div class="text-sm font-medium text-gray-900">
                                                Purchase Rate
                                                </div>
                                                <div class="text-sm" v-bind:class="[product.PurchaseRate <1 ? ' text-red-400' : ' text-gray-500 ']">
                                                {{product.PurchaseRate}}
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <!-- <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                        <div class="text-sm text-gray-500">Optimization</div> -->
                                        <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full" v-bind:class="[product.office<1 ? ' bg-red-400 text-white ':' bg-green-100 text-green-800 ']">
                                        {{product.office}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full" v-bind:class="[product.das<1 ? ' bg-red-400 text-white ':' bg-green-100 text-green-800 ']">
                                        {{product.das}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full" v-bind:class="[product.zero_one<1 ? ' bg-red-400 text-white ':' bg-green-100 text-green-800 ']">
                                        {{product.zero_one}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full" v-bind:class="[product.zero_two<1 ? ' bg-red-400 text-white ':' bg-green-100 text-green-800 ']">
                                        {{product.zero_two}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full" v-bind:class="[product.techmate<1 ? ' bg-red-400 text-white ':' bg-green-100 text-green-800 ']">
                                        {{product.techmate}}
                                        </span>
                                    </td>
                                    <!-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td> -->
                                </tr>

                                <tr v-show="products.length <1">
                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Ener SKU or Code to get product stock data...</td>
                                </tr>

                                <!-- More items... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
    import AutoComplete from './AutoComplete.vue';
    import VueBootstrapTypeahead from 'vue-bootstrap-typeahead';

    export default {
        components: {
            JetApplicationLogo,
            AutoComplete,
            VueBootstrapTypeahead
        },
        data() {
            return {
                form:{
                    sku:null
                },
                products:[],
                skus: ['ssd','ssa','mmd'],
                skuSearch: null,
                selectedSku: null
            }
        },
         mounted() {
            this.getSkus();
        },
        methods:{
            stocks() {
                fetch('/api/stock')
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                });
            },
            getStock(data) {
                axios.post('/api/get_stock', {body:this.form})
                .then(res => {
                    this.products=res.data;
                    // this.addresses = res.data

                })
                .catch(e => {
                    console.log(e);
                });
            },
            async getSkus(query) {
                // const res = await fetch(API_URL.replace(':query', query))
                // const suggestions = await res.json()
                // this.skus = suggestions.suggestions
                await axios.post('/api/get_suggestions', {query})
                .then(res => {
                    // console.log(this.skus);
                    res.data.forEach(element => {
                        this.skus.push(element.sku);
                        // console.log(this.skus);
                    });
                    // this.addresses = res.data

                })
                .catch(e => {
                    console.log(e);
                });
            }
        },
        watch: {
            skuSearch: _.debounce(function(addr) { this.getSkus(addr) }, 500)
        }
    }
</script>
