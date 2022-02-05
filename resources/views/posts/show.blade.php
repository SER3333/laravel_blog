@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">A{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                {{$data->translatedFormat('F')}} {{$data->day}}, {{$data->year}} • {{$data->format('H:i')}} • {{$post->comments->count()}} Коментарі
            </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('Storage/'. $post->preview_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!!$post->content!!}
                    </div>
                </div>
            </section>
            <section>
                @auth
                <div class="col-lg-9 mx-auto">
                    <liked-component :post_id="{{$post->id}}" 
                                     :user_id="{{auth()->user()->id}}"
                                     :post_liked="{{$post->liked_users_count}}"
                                     :if_user_liked="{{auth()->user()->likedPosts->contains($post->id)?'true':'false'}}">
                    </liked-component>
                </div>
                @endauth
                @guest
                <div class="col-lg-9 mx-auto">
                    <span>{{$post->liked_users_count}}</span>
                    <i class="far fa-thumbs-up"></i>
                </div>
                @endguest
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожі пости</h2>
                        
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{asset('Storage/'. $relatedPost->preview_image)}}" alt="related post" class="post-thumbnail">
                                    <p class="post-category">{{$relatedPost->category->title}}</p>
                                    <a href="{{route('posts.show', $relatedPost->id)}}" class="blog-post-permalink">
                                        <h5 class="post-title">
                                            {{$relatedPost->title}}
                                        </h5>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        
                    </section>
                    <h2 class="section-title mb-5" data-aos="fade-up">Коментарії</h2>
                    @guest 
                    <div class="card-footer card-comments"> 
                        @foreach($post->comments as $comment)
                        <div class="card-comment">                                       
                          <div class="comment-text">
                            <span class="username">
                              {{$comment->user->name}}
                              <span class="text-muted float-right">{{$comment->created_at}}</span>
                            </span><!-- /.username -->
                            {{$comment->message}}
                          </div>
                          <!-- /.comment-text -->
                        </div>
                        @endforeach
                        <!-- /.card-comment -->    
                    </div>
                    @endguest
                    @auth
                    <comment-component :post_id="{{$post->id}}"
                                       :user_id="{{auth()->user()->id}}"
                                       :post_comments="{{$post->comments->load('user')}}"
                                       >
                        
                    </comment-component>
                    @endauth
                    
                    
                </div>
            </div>
        </div>
    </main>
@endsection