<div class = "row">
@foreach($notes as $note)
        <div class = "card-deck col-6 col-lg-3">
            <div class = "card">
                <img class = "card-img-top" src = "{{ $note->book_image }}" alt = "non image">
                <div class = "card-footer">
                   <h4>{!! link_to_route('notes.show', $note->title, ['note' =>$note->id],) !!}</h4>
                   @include('notes.like_button')
                </div>
            </div>
        </div>
@endforeach
</div><br/><br/>