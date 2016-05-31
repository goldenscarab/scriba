<div class="panel-body">
	<div class="container-fluid items-list col-xs-12">
		@forelse($notes as $n)
			<div class="item-wrapper row" data-id="{{ $n->id }}">
				<div class="item-line col-xs-12">
					<div class="note-name col-xs-7">{{ str_limit($n->name, config('scriba.note-list-len-max')) }}</div>
					<div class="note-date col-xs-5 text-right">{{ $n->updated_at->diffForHumans() }}</div>
				</div>
				<div class="item-line col-xs-12">
					<div class="note-subject col-xs-7">{{ str_limit(($n->subject != "")?$n->subject:$n->content, 30) }}</div>
					<div class="note-size col-xs-5 text-right">{{ number_format(strlen($n->content), 0, ',', ' ')." Octets" }}</div>
				</div>
			</div>
		@empty
			<div class="item-wrapper-disabled row" data-id="1">
				<div class="item-line col-xs-12">
					Aucun élements à afficher...
				</div>
			</div>
		@endforelse
	</div>
</div>
<div class="panel-footer">
	{{ sizeof($notes)." élement(s)" }}				
</div>
