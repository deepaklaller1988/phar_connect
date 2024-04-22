<form id="post-form">
    @csrf
    <div class="white_card_body">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Zone</label>
                    <select name="zone" id="zone" class="form-control selectFixCZ">
                        <option value="">Select Zone</option>
                        @foreach($data['zones'] as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                        @endforeach
                    </select>
                    <span id="zoneerror"></span>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Title:</label>
                    <input type="text" name="company_name" id="company_name" class="form-control">
                    <span id="cnerror"></span>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>URL:</label>
                    <input type="text" name="company_website" id="company_website" class="form-control">
                    <span id="cwerror"></span>
                </div>
            </div>
            <input type="hidden" name="category_id" id="parent_id" value="{{ $data['parent_id']}}">
            <input type="hidden" name="parent_id" value="{{ $data['parent_id']}}">
            <input type="hidden" name="email" value="{{ $data['user']->email }}">
            <input type="hidden" name="phone" value="{{ $data['user']->phone }}">
            <div class="col-12 mb-3">
                <div class="create_report_btn mt_30">
                    <button type="submit" class="btn_1 radius_btn d-block text-center btnsCZ">
                        {{ __('Save') }}
                    </button> 
                </div>
            </div>
        </div>
    </div>
</form>