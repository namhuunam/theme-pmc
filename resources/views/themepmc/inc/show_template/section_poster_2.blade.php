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
            <li class="item small">
                <span class="label"></span>
                <a title="{{ $movie->name }} - {{ $movie->origin_name }}" href="{{ $movie->getUrl() }}">
                    <img width="238" height="134" class="img-2 lazyload" 
                         alt="{{ $movie->name }} - {{ $movie->origin_name }}" 
                         data-src="{{ \App\Helpers\OptimizedImage::get($movie->getPosterUrl(), 'small') }}"
                         data-srcset="{{ \App\Helpers\OptimizedImage::srcset($movie->getPosterUrl(), ['small', 'thumbnail']) }}"
                         sizes="(max-width: 768px) 150px, 238px"
                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
                    <p>{{ $movie->name }}</p> <i class="icon-play"></i>
                </a>
            </li>
        @endforeach
    </ul>
</div>