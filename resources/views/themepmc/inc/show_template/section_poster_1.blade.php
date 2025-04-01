<div class="block">
    <div class="heading">
        <a href="{{ $item['link'] ?? '/' }}">
            <h2 class="caption">{{ $item['label'] }}</h2>
        </a>
        @if ($item['link'])
            <a class="see-more" href="{{ $item['link'] }}">Xem tất cả<i class="fa fa fa-caret-right"></i></a>
        @endif
    </div>
    <ul class="list-film horizontal">
        @foreach ($item['data'] as $movie)
            @if ($loop->first)
                <li class="item large">
                    <span class="label">{{$movie->episode_current}} {{$movie->quality}} {{$movie->language}}</span>
                    <a title="{{ $movie->name }} - {{ $movie->origin_name }}" href="{{ $movie->getUrl() }}">
                        <img width="485" height="273" class="img-1 lazyload"
                            alt="{{ $movie->name }} - {{ $movie->origin_name }}"
                            data-src="{{ \App\Helpers\OptimizedImage::get($movie->getPosterUrl(), 'large') }}" 
                            data-srcset="{{ \App\Helpers\OptimizedImage::srcset($movie->getPosterUrl(), ['large', 'medium']) }}"
                            sizes="(max-width: 768px) 100vw, 485px"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
                        <p>{{ $movie->name }}</p> <i class="icon-play"></i>
                    </a>
                </li>
            @else
                <li class="item small">
                    <span class="label">{{$movie->episode_current}} {{$movie->quality}} {{$movie->language}}</span>
                    <a title="{{ $movie->name }} - {{ $movie->origin_name }}" href="{{ $movie->getUrl() }}">
                        <img width="238" height="134" class="img-2 lazyload"
                            alt="{{ $movie->name }} - {{ $movie->origin_name }}"
                            data-src="{{ \App\Helpers\OptimizedImage::get($movie->getPosterUrl(), 'small') }}"
                            data-srcset="{{ \App\Helpers\OptimizedImage::srcset($movie->getPosterUrl(), ['small', 'thumbnail']) }}"
                            sizes="(max-width: 768px) 150px, 238px"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
                        <p>{{ $movie->name }}</p>
                        <i class="icon-play"></i>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>