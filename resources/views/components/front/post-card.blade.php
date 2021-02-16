@props(['post'])

<div class="overflow-hidden transition-shadow duration-300 bg-white rounded shadow-sm">
    <img
        src="https://images.pexels.com/photos/2408666/pexels-photo-2408666.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;w=500"
        class="object-cover w-full h-64" alt=""/>
    <div class="p-5 border border-t-0">
        <p class="mb-3 text-xs font-semibold tracking-wide uppercase">
            <a href="/" class="transition-colors duration-200 text-blue-gray-900 hover:text-deep-purple-accent-700"
               aria-label="Category">@foreach($post->categories as $category) {{$category->title}} @endforeach </a>
            <span class="text-gray-600"> {{ $post->created_at }}</span>
        </p>
        <a href="{{route('posts.display', $post->slug)}}" aria-label="Category" title="Visit the East"
           class="inline-block mb-3 text-2xl font-bold leading-5 transition-colors duration-200 hover:text-deep-purple-accent-700">{{$post->title}}</a>
        <p class="mb-2 text-gray-700">
            {{Str::limit($post->excerpt, 150)}}
        </p>

        <div class="flex justify-between mt-3">
            <a href="{{route('posts.display', $post->slug)}}" aria-label=""
               class="inline-flex justify-items-end font-semibold transition-colors duration-200 text-green-500 hover:text-green-800">Lire
                l'article</a>

            <div class="flex space-x-4">
                <a href="/" aria-label="Likes"
                   class="flex items-start text-gray-800 transition-colors duration-200 hover:text-deep-purple-accent-700 group">
                    <div class="mr-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            class="w-5 h-5 text-gray-600 transition-colors duration-200 group-hover:text-deep-purple-accent-700"
                        >
                            <polyline points="6 23 1 23 1 12 6 12" fill="none" stroke-miterlimit="10"></polyline>
                            <path
                                d="M6,12,9,1H9a3,3,0,0,1,3,3v6h7.5a3,3,0,0,1,2.965,3.456l-1.077,7A3,3,0,0,1,18.426,23H6Z"
                                fill="none" stroke="currentColor" stroke-miterlimit="10"></path>
                        </svg>
                    </div>
                    <p class="font-semibold">7.4K</p>
                </a>
                <a href="/" aria-label="Comments"
                   class="flex items-start text-gray-800 transition-colors duration-200 hover:text-deep-purple-accent-700 group">
                    <div class="mr-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-5 h-5 text-gray-600 transition-colors duration-200 group-hover:text-deep-purple-accent-700"
                        >
                            <polyline points="23 5 23 18 19 18 19 22 13 18 12 18" fill="none"
                                      stroke-miterlimit="10"></polyline>
                            <polygon points="19 2 1 2 1 14 5 14 5 19 12 14 19 14 19 2" fill="none" stroke="currentColor"
                                     stroke-miterlimit="10"></polygon>
                        </svg>
                    </div>
                    <p class="font-semibold">81</p>
                </a>
            </div>
        </div>
    </div>
</div>
