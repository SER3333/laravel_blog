<template>
  <div>
    <div id="app">
      <button @click.prevent="storeLiked" class="border-0 bg-transparent">
        <span>{{this.liked}}</span>
        <i class="fas fa-thumbs-up" v-if="user_liked"></i>
        <i class="far fa-thumbs-up" v-else></i>
      </button>
      
    </div>
  </div>
  <!-- Ваш HTML -->
</template>

<script>
  export default {
    name: "LikedComponent",
    props :[
      'post_id',
      'user_id',
      'post_liked',
      'if_user_liked',
    ],

    data(){
      return{
         liked:null,
         user_liked:null,
      }
    },

    mounted () {
      this.showLiked()
    },

    methods:{
      getLiked(){ 
        axios.get(`/api/post/liked/${this.post_id}/${this.user_id}`)
          .then(res=>{
            this.liked = res.data.post_count
            this.user_liked = res.data.user_liked
          })
      },

      storeLiked(){
        axios.post(`/api/post/liked/${this.post_id}/${this.user_id}`)
          .then(res=>{
            this.getLiked()
            
          })
      },

      showLiked(){
        this.user_liked = this.if_user_liked
        this.liked=this.post_liked 
      },

    },

  }
</script>

<style>
  /* Ваш CSS */
</style>