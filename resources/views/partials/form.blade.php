<form
    role="form"
    method="post"
    action="{{ route('load-articles') }}"
>
    {!! csrf_field() !!}
    <div class="form-group">
        <div class="row">
            <div class="col-md-8">
                <input id="feeds" name="feeds" list="feed-list" class="form-control" placeholder="Paste your RSS URL or Select from the drop down" value="{{ $url ? $url : '' }}" type="url" required>
                <datalist id="feed-list">
                    @if($results)
                        @foreach($results as $result)
                            <option value="{{ $result->url }}">
                        @endforeach
                    @endif
                </datalist>

            </div>
            <div class="col-md-2">
                <div id="edit-btn" class="btn btn-primary btn-block">
                    EDIT LIST
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success btn-block">
                    GO
                </button>
            </div>
        </div>
    </div>
</form>
