<div class="row" id="{{ $tag }}-cards">
    @php
        $groupId = 1;
    @endphp

    @if (!empty($groups))
        @foreach ($groups as $group)
            <div class="col-6 col-sm-6 group">
                <div class="card border-info bg-transparent">
                    <div class="card-content d-flex">
                        <div class="card-body">
                            <div class="input-group mb-1 {{ $tag }}-row">
                                <input type="text" name="groups[]" class="form-control" value="{{ $group->name }}"
                                    placeholder="Group name" aria-describedby="button-addon2">
                                <input type="hidden" name="group_ids[]" value="{{ $group->id }}">
                                <div class="input-group-append" id="button-addon2">
                                </div>
                            </div>
                            <button type="button" class="btn btn-success add-new-row" data-id="{{ $groupId }}"
                                data-type="{{ $tag }}" onclick="return addNewRow(this)">Add New Row</button>
                            <button type="button" class="btn btn-danger remove-group" data-id="{{ $groupId }}"
                                data-type="{{ $tag }}" onclick="return removeGroup(this)">Remove Group</button>
                            <div class="item-section mt-2" id="section-{{ $tag }}-{{ $groupId }}">
                                @foreach ($group->tourData as $set)
                                    <div class="input-group mb-1 include-exclude-row">
                                        <input type="text" name="items_{{ $groupId }}[]"
                                            value="{{ $set->item }}" class="form-control input-text"
                                            placeholder="Add Items" aria-describedby="button-addon2">
                                        <input type="hidden" name="item_ids_{{ $groupId }}[]"
                                            value="{{ $set->id }}">
                                        <div class="input-group-append" id="button-addon2">
                                            <button
                                                class="btn btn-danger waves-effect waves-light {{ $tag }}-remove"
                                                onclick="return removeRows(this)" type="button">-</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $groupId += 100;
            @endphp
        @endforeach
    @else
        <div class="col-6 col-sm-6">
            <div class="card border-info bg-transparent">
                <div class="card-content d-flex">
                    <div class="card-body">
                        <div class="input-group mb-1 {{ $tag }}-row">
                            <input type="text" name="groups[]" class="form-control" placeholder="Group name"
                                aria-describedby="button-addon2">
                            <div class="input-group-append" id="button-addon2">
                            </div>
                        </div>
                        <button type="button" class="btn btn-success add-new-row" data-id="1"
                            data-type="{{ $tag }}" onclick="return addNewRow(this)">Add New Row</button>
                        <button type="button" class="btn btn-danger remove-group" data-id="1"
                            data-type="{{ $tag }}" onclick="return removeGroup(this)">Remove Group</button>
                        <div class="item-section mt-2" id="section-{{ $tag }}-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<button type="button" class="btn btn-success add-{{ $tag }}-group">Add New Group</button>
