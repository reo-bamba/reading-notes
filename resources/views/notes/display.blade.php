@foreach($notes as $note)
    <div class = "row no-gutters">
        <div class = "card-deck" style="margin-left: 20px; width:18rem;">
            <div class = "card">
                <img class = "card-img-top" src = "/uproads/{{ $note->book_image }}" alt = "non image" style ="width: 12rem; height: 180px;">
                <div class = "card-footer">
                   <h4>{!! link_to_route('notes.show', $note->title, ['note' =>$note->id],) !!}</h4>
                </div>
            </div>
        </div>
    </div>
@endforeach