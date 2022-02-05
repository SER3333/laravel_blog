import Vue from 'vue'

require('./bootstrap');


import LikedComponent from "./components/Post/LikedComponent"
import CommentComponent from "./components/Post/CommentComponent"

const app = new Vue({
    el: '#app',
    components:{
        
        LikedComponent,
        CommentComponent,
    }
});
