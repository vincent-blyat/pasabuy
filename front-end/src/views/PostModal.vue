<template>
    <!-- Post Modal-->
    <div v-on:click.self="close" class="bg-black font-nunito bg-opacity-25 fixed inset-0 flex justify-center items-center">
     <div class="inline-flex flex-col space-y-2 bg-white shadow rounded-xl h-auto w-550 vs:w-96.7">
        <div class="flex flex-col  mt-4">

            <!--Create Post section-->
            <h1 class="items-center justify-center ml-24 vs:ml-14 pb-6 text-gray-900 leading-normal pl-20 text-2xl font-bold text-center">
                Create Post
                <button @click.prevent="close" class="pl-14 ml-20 vs:ml-8 focus:outline-none text-sm mb-1 leading-none text-indigo-900">
                Close
                </button>
              </h1>
            <!--end-->

            <!--Shopping Offer and Order Request Button-->
             <div class="flex flex-row items-center justify-around space-x-2">
                <div @click=" isActive_function('btn1')" :class="{active: activeBtn === 0 }" class="inline-flex">
                    <button @click="toggleShopOfferbtn" class="text-base font-nunito font-bold focus:outline-none leading-none text-center text-black uppercase">Shopping Offer</button>
                 </div>
                 <div @click=" isActive_function('btn2')" :class="{active: activeBtn === 'btn2' }" class="inline-flex">
                    <button @click="toggleOrderRequestbtn" class="text-base font-nunito font-bold focus:outline-none leading-none text-center text-black uppercase">Order Request</button>
                 </div>
             </div>
             <hr>
             <!--end-->
            <component :is="component"/>   
      </div>
     </div>
    </div>
    <!--end of Post Modal-->
</template>

<script>
import shopOfferPost from  './shopOfferPost'
import orderRequestPost from './orderRequestPost'
export default {
    components: {
        shopOfferPost,
        orderRequestPost
    },
    data(){
        return {
        component: "shopOfferPost",
        component2: "orderRequestPost",
        isVisible: true,
        activeBtn:0,
        }
    },
    methods: {
        toggleShopOfferbtn(){
            if(this.component != shopOfferPost)
            this.component = shopOfferPost;
        },
        toggleOrderRequestbtn(){
            if(this.component != orderRequestPost)
            this.component = orderRequestPost;
        },
        close(){
            this.$emit('closeModal')
        },
         isActive_function(el){
        if(el=='btn1'){
        this.activeBtn= 0;
        }
        else {
        this.activeBtn= el;
        }
        },
    },
}
</script>

<style scoped>
.active {
  color:red;  
  border-bottom: solid red 5px;
}
.active button{
  color:red;
}
</style>