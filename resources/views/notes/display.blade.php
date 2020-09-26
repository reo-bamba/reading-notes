<div class = "row">
@foreach($notes as $note)
        <div class = "card-deck" style="margin:30px 0 70px 20px; width:16rem;">
            <div class = "card">
                <img class = "card-img-top" src = "/uproads/{{ $note->book_image }}" alt = "non image" style ="width: 12rem; height: 180px;">
                <div class = "card-footer">
                   <h4>{!! link_to_route('notes.show', $note->title, ['note' =>$note->id],) !!}</h4>
                   @include('notes.like_button')
                </div>
            </div>
        </div>
@endforeach
</div>