<div class="col-md-8 offset-md-2 mt-4">
    <form id="crmForm" action="{{ route('entries.update', ['entry' => $entry->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <p>FDA ID<br />
                <input type="number" name="fda_id" class="form-control" placeholder="Enter Item ID" value="{{ $entry->fda_id }}" required>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Entry Date<br />
                <input type="text" name="upload_date" class="form-control datepicker" placeholder="YYYY-MM-DD" value="{{ $entry->upload_date }}" required>
                </p>
            </div>
        </div>
        <p><input type="submit" class="btn btn-primary" value="Submit"></p>
    </form>
</div>