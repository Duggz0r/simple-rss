@if($results)
    <div id="edit-table" style="display: none;">
        <form
            role="form"
            method="post"
            action="{{ route('edit-articles') }}"
        >
            {!! csrf_field() !!}
            <div class="table-responsive">
                <table style="border: 1px solid #dddddd;" class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">
                            URL
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($results as $result)
                        <tr>
                            <td>
                                <input id="{{ $result->id }}" name="{{ $result->id }}" type="url" value="{{ $result->url }}"
                                       class="form-control">
                            </td>
                            <td>
                                <a href="{{ route('delete', $result->id) }}" class="btn btn-danger">
                                    DELETE
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-success">
                                SAVE ALL
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
@endif

<script>
    $('#edit-btn').click(function () {
        $('#edit-table').show();
    });
</script>
