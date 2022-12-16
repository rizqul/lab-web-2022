<div class="col-3">
    <div class="top-categories mb-3">
        <div class="title topic-title">
            <p class="h3 mb-3">Popular Topic</p>
        </div>
        <div class="topic-section">
            @foreach ($top_category as $category)
                <div class="top-topic">{{ $category->name }}</div>
            @endforeach
        </div>
    </div>
    <div class="top-authors">
        <div class="title author-title">
            <p class="h3 mb-3">Authors</p>
        </div>
        <div class="author-section">
            @foreach ($top_authors as $author)
                <div class="top-author d-flex">
                    @if (empty($author->img_src))
                        <img alt="image" src="../assets/img/avatar/avatar-2.png"
                            class="rounded-circle profile-widget-picture"
                            style="width: 30px; height: 30px; object-fit: cover;">
                    @elseif(str_contains($author->img_src, 'post-images'))
                        <img alt="image" src="{{ asset('storage/' . $author->img_src) }}"
                            class="rounded-circle profile-widget-picture"
                            style="width: 30px; height: 30px; object-fit: cover;">
                    @else
                        <img alt="image" src="{{ $author->img_src }}" class="rounded-circle profile-widget-picture"
                            style="width: 30px; height: 30px; object-fit: cover;">
                    @endif
                    <p class="my-auto h5 ml-3">{{ $author->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
