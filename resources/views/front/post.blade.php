@extends('front.layout')

@section('content')
    <main>
        <section class="relative block" style="height: 500px;">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                 style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80");'>
                <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
            </div>
        </section>
        <section class="relative py-16 bg-white">
            <div class="container w-3/5">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                            <div class="relative">
                                <img alt="..." src="https://cdn.auth0.com/blog/illustrations/laravel.png"
                                     class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"
                                     style="max-width: 150px;"/>
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                            <div class="py-6 px-3 mt-32 sm:mt-0">
                                @foreach ($post->categories as $category)
                                    <a href="{{ route('category', $category->slug) }}"
                                       class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                                       type="button" style="transition: all 0.15s ease 0s;">
                                        {{ $category->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4 lg:order-1">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                <div class="mr-4 p-3 text-center">
                                        <span
                                            class="text-xl font-bold block uppercase tracking-wide text-gray-700">22</span>
                                    <span class="text-sm text-gray-500">Likes</span>
                                </div>
                                <div class="lg:mr-4 p-3 text-center">
                                        <span
                                            class="text-xl font-bold block uppercase tracking-wide text-gray-700">89</span>
                                    <span class="text-sm text-gray-500">Comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2">
                            {{ $post->title }}
                        </h3>
                    </div>

                    <div class="text-center">
                        <h3 class="text-sm font-semibold leading-normal mb-2 text-gray-800 mb-2">
                            Rédigé le : {{ formatDate($post->created_at) }}
                        </h3>
                        <div class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase">
                            @foreach($post->tags as $tag)
                                <a class="mr-3" href="{{ route('tag', $tag->slug) }}"> {{ $tag->tag }} </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-10 py-10 border-gray-300 text-center">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                    {{$post->excerpt}}
                                </p>
                            </div>
                                <div class="px-4 py-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl">
                                    <div class="s-content__entry-content">
                                        {!! $post->body !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <!-- comments
    ================================================== -->
        <section class="bg-white">
            <div class="container w-3/5">
                <div
                    class="flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg">
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="comments-wrap">
                                <div id="comments" class="row">
                                    <div id="commentsList" class="column large-12">
                                        @if($post->valid_comments_count > 0)
                                            <div id="forShow">
                                                <p id="showbutton" class="text-center">
                                                    <a id="showcomments" href="{{ route('posts.comments', $post->id) }}"
                                                       class="btn h-full-width">@lang('Show comments')</a>
                                                </p>
                                                <p id="showicon" class="h-text-center" hidden>
                                                    <span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>
                                                </p>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                                @if(Auth::check())
                                    <div class="row comment-respond">
                                        <div id="respond" class="column">
                                            <h3>@lang('Add Comment')
                                                <span id="forName"></span>
                                                <span><a id="abort" hidden href="#">@lang('Abort reply')</a></span>
                                            </h3>
                                            <div id="alert" class="alert-box" style="display: none">
                                                <p></p>
                                                <span class="alert-box__close"></span>
                                            </div>
                                            <form id="messageForm" method="post"
                                                  action="{{ route('posts.comments.store', $post->id) }}"
                                                  autocomplete="off">
                                                <input id="commentId" name="commentId" type="hidden" value="">
                                                <div class="message form-field">
                            <textarea name="message" id="message" class="h-full-width"
                                      placeholder="@lang('Your Message')"></textarea>
                                                </div>
                                                <br>
                                                <p id="forSubmit" class="text-center">
                                                    <input name="submit" id="submit"
                                                           class="btn btn-primary btn-wide btn--large h-full-width"
                                                           value="@lang('Add Comment')" type="submit">
                                                </p>
                                                <p id="commentIcon" class="h-text-center" hidden>
                                                    <span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        (() => {

            // Variables
            const headers = {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }

            // Prepare show comments
            const prepareShowComments = e => {
                e.preventDefault();

                document.getElementById('showbutton').toggleAttribute('hidden');
                document.getElementById('showicon').toggleAttribute('hidden');
                showComments();
            }

            // Show comments
            const showComments = async () => {

                // Send request
                const response = await fetch('{{ route('posts.comments', $post->id) }}', {
                    method: 'GET',
                    headers: headers
                });

                // Wait for response
                const data = await response.json();

                document.getElementById('commentsList').innerHTML = data.html;
            }

            // Listener wrapper
            const wrapper = (selector, type, callback, condition = 'true', capture = false) => {
                const element = document.querySelector(selector);
                if (element) {
                    document.querySelector(selector).addEventListener(type, e => {
                        if (eval(condition)) {
                            callback(e);
                        }
                    }, capture);
                }
            };

            // Set listeners
            window.addEventListener('DOMContentLoaded', () => {
                wrapper('#showcomments', 'click', prepareShowComments);
            })

        })()

    </script>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        (() => {

            // Variables
            const headers = {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
            const commentId = document.getElementById('commentId');
            const alert = document.getElementById('alert');
            const message = document.getElementById('message');
            const forName = document.getElementById('forName');
            const abort = document.getElementById('abort');
            const commentIcon = document.getElementById('commentIcon');
            const forSubmit = document.getElementById('forSubmit');

            // Add comment
            const addComment = async e => {
                e.preventDefault();

                // Get datas
                const datas = {
                    message: message.value
                };

                if (document.querySelector('#commentId').value != '') {
                    datas['commentId'] = commentId.value;
                }

                // Icon
                commentIcon.hidden = false;
                forSubmit.hidden = true;

                // Send request
                const response = await fetch('{{ route('posts.comments.store', $post->id) }}', {
                    method: 'POST',
                    headers: headers,
                    body: JSON.stringify(datas)
                });

                // Wait for response
                const data = await response.json();

                // Icon
                commentIcon.hidden = true;
                forSubmit.hidden = false;

                // Manage response
                if (response.ok) {
                    purge();
                    if (data == 'ok') {
                        showComments();
                        showAlert('success', '@lang('Your comment has been saved')');
                    } else {
                        showAlert('info', "@lang('Thanks for your comment. It will appear when an administrator has validated it. Once you are validated your other comments immediately appear.')");
                    }
                } else {
                    if (response.status == 422) {
                        showAlert('error', data.errors.message[0]);
                    } else {
                        errorAlert();
                    }
                }
            }

            const errorAlert = () => Swal.fire({
                icon: 'error',
                title: '@lang('Whoops!')',
                text: '@lang('Something went wrong!')'
            });

            // Show alert
            const showAlert = (type, text) => {
                alert.style.display = 'block';
                alert.className = '';
                alert.classList.add('alert-box', 'alert-box--' + type);
                alert.firstChild.textContent = text;
            }

            // Hide alert
            const hideAlert = () => alert.style.display = 'none';

            // Prepare show comments
            const prepareShowComments = e => {
                e.preventDefault();

                document.getElementById('showbutton').toggleAttribute('hidden');
                document.getElementById('showicon').toggleAttribute('hidden');
                showComments();
            }

            // Show comments
            const showComments = async () => {

                // Send request
                const response = await fetch('{{ route('posts.comments', $post->id) }}', {
                    method: 'GET',
                    headers: headers
                });

                // Wait for response
                const data = await response.json();

                document.getElementById('commentsList').innerHTML = data.html;
                @if(Auth::check())
                document.getElementById('respond').hidden = false;
                @endif
            }

            // Reply to comment
            const replyToComment = e => {
                e.preventDefault();

                forName.textContent = `@lang('Reply to') ${e.target.dataset.name}`;
                commentId.value = e.target.dataset.id;
                abort.hidden = false;
                message.focus();
            }

            // Abort reply
            const abortReply = (e) => {
                e.preventDefault();
                purge();
            }

            // Purge reply
            const purge = () => {
                forName.textContent = '';
                commentId.value = '';
                message.value = '';
                abort.hidden = true;
            }

            // Listener wrapper
            const wrapper = (selector, type, callback, condition = 'true', capture = false) => {
                const element = document.querySelector(selector);
                if (element) {
                    document.querySelector(selector).addEventListener(type, e => {
                        if (eval(condition)) {
                            callback(e);
                        }
                    }, capture);
                }
            };

            // Set listeners
            window.addEventListener('DOMContentLoaded', () => {
                wrapper('#showcomments', 'click', prepareShowComments);
                wrapper('#abort', 'click', abortReply);
                wrapper('#message', 'focus', hideAlert);
                wrapper('#messageForm', 'submit', addComment);
                wrapper('#commentsList', 'click', replyToComment, "e.target.matches('.replycomment')");
            })

        })()


        // Delete comment
        const deleteComment = async e => {
            e.preventDefault();
            Swal.fire({
                title: '@lang('Really delete this comment?')',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "@lang('Yes')",
                cancelButtonText: "@lang('No')",
                preConfirm: () => {
                    return fetch(e.target.getAttribute('href'), {
                        method: 'DELETE',
                        headers: headers
                    })
                        .then(response => {
                            if (response.ok) {
                                showComments();
                            } else {
                                errorAlert();
                            }
                        });
                }
            });
        }
        // Set listeners
        window.addEventListener('DOMContentLoaded', () => {
        ...
            wrapper('#commentsList', 'click', deleteComment, "e.target.matches('.deletecomment')");
        })
    </script>
@endsection


