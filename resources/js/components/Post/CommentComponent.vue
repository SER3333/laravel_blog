<template>
	<div>
		
		<div class="card-footer card-comments">
                        
      
      <div class="card-comment">                                       
        <div v-for="comment in comments" class="comment-text">
          <span class="username">
            {{comment.user.name}}
          	<span class="text-muted float-right">{{comment.created_at}}</span>
          </span>
          {{comment.message}}
        </div>
                          
      </div>
      
                        
    </div>
    
    <section class="comment-section">
    	<h2 class="section-title mb-5" data-aos="fade-up">Додати коментар</h2>
      
        
        <div class="row">
          <div class="form-group col-12" data-aos="fade-up">
            <label for="comment" class="sr-only">C</label>
            <textarea v-model="message" name="message" id="message" class="form-control" placeholder="Коментар" rows="10"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <input @click.prevent="addComment" type="submit" value="Додати коментар" class="btn btn-warning">
          </div>
        </div>
      
    </section>
	</div>
</template>

<script>
	export default{
		name:"CommentComponent",
		props :[
      'post_id',
      'user_id',
      'post_comments',
    ],

    data(){
      return{
        comments:null,
        message:null
      }
    },

    mounted(){
      this.showComments()
      
    },
    methods:{
      getComments(){ 
      axios.get(`/api/post/comment/${this.post_id}`)
        .then(res=>{
          this.comments=res.data
        })
      },

      addComment(){
        axios.post(`/api/post/comment/${this.post_id}/${this.user_id}`,{message:this.message})
        .then(res=>{
          this.message=null
          this.getComments()
        })
        
      },

      showComments(){
        this.comments = this.post_comments
      },

    },
    

	}
	
</script>

<style>
  /* Ваш CSS */
</style>