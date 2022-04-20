<div class="col-md-8 offset-md-2 mt-4">
<form id="crmForm" action="" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <p>
                    <b>Food Name</b><br /><hr />
                    <p>{{ $entry->description }}</p>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <b>Date Uploaded</b><br /><hr />
                    <p>{{ $entry->upload_date }}</p>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <b>Serving Size</b><br /><hr />
                    <p>{{ $entry->servingSize }}</p>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <b>Serving Size Unit</b><br /><hr />
                    <p>{{ $entry->servingSizeUnit }}</p>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <b>Serving Full Text</b><br /><hr />
                    <p>{{ $entry->householdServingFullText }}</p>
                </p>
            </div>
        </div>
    </form>
</div>