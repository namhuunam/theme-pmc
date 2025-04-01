<div class="block top-slide">
    <div class="heading">
        <h2 class="caption" title="Xem Phim">Phim Đề Cử</h2>
    </div>
    <ul id="film-hot" class="list-film">
        @foreach ($recommendations as $movie)
            <li class="item">
                <span class="label">
                    <span class="film-format">{{$movie->episode_current}} | {{$movie->language}}</span>
                </span>
                <a title="{{$movie->name}}" href="{{$movie->getUrl()}}">
                    <img alt="{{$movie->name}}" 
                         width="219" height="123"
                         class="lazyload" 
                         data-src="{{ \App\Helpers\OptimizedImage::get($movie->getPosterUrl(), 'small') }}"
                         data-srcset="{{ \App\Helpers\OptimizedImage::srcset($movie->getPosterUrl()) }}"
                         sizes="(max-width: 640px) 150px, 219px"
                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
                    <p>{{$movie->name}}</p> <i class="icon-play"></i>
                </a>
            </li>
        @endforeach
    </ul>
</div>