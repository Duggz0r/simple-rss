<table id="rsstable" class="table table-bordered table-hover table-striped">
    <tbody>
    @foreach($articles as $article)
        <tr>
            <td>
                <h4 class="mb-0">
                    <a href="{{ $article['link']}}" target="_blank">{!! $article['title'] !!}</a>
                </h4>
                <p><em>{!! $article['description'] !!}</em></p>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
