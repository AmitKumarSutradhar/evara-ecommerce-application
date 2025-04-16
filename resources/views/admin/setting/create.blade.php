@extends('admin.master')
@section('title' , 'Manage Setting')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Setting Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Setting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Setting</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Setting Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ session('message') }}</p>
                    <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="row mb-4">
                            <label for="compnayName" class="col-md-3 form-label">Company Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="compnayName" name="compnay_name" placeholder="Company Name" type="text">
                                <span class="text-danger">{{ $errors->has('compnay_name') ?  $errors->first('compnay_name') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="compnaySlogun" class="col-md-3 form-label">Slogun</label>
                            <div class="col-md-9">
                                <input class="form-control" id="compnaySlogun" name="slogun" placeholder="Slogun" type="text">
                                <span class="text-danger">{{ $errors->has('slogun') ?  $errors->first('slogun') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="siteTitle" class="col-md-3 form-label">Site Title</label>
                            <div class="col-md-9">
                                <input class="form-control" id="siteTitle" name="site_title" placeholder="Site Title" type="text">
                                <span class="text-danger">{{ $errors->has('site_title') ?  $errors->first('site_title') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="contactPhone" class="col-md-3 form-label">Contact Phone</label>
                            <div class="col-md-9">
                                <input class="form-control" id="contactPhone" name="contact_phone" placeholder="+880 123XXXXXXXX" type="number">
                                <span class="text-danger">{{ $errors->has('contact_phone') ?  $errors->first('contact_phone') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="supportPhone" class="col-md-3 form-label">Support Phone</label>
                            <div class="col-md-9">
                                <input class="form-control" id="supportPhone" name="support_phone" placeholder="+880 123XXXXXXXX" type="number">
                                <span class="text-danger">{{ $errors->has('support_phone') ?  $errors->first('support_phone') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="contactEmail" class="col-md-3 form-label">Contact Email</label>
                            <div class="col-md-9">
                                <input class="form-control" id="contactEmail" name="contact_email" placeholder="e.g. contact.evara@gmail.com" type="email">
                                <span class="text-danger">{{ $errors->has('contact_email') ?  $errors->first('contact_email') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="supportEmail" class="col-md-3 form-label">Support Email</label>
                            <div class="col-md-9">
                                <input class="form-control" id="supportEmail" name="support_email" placeholder="e.g. support.evara@gmail.com" type="email">
                                <span class="text-danger">{{ $errors->has('support_email') ?  $errors->first('support_email') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="officeHour" class="col-md-3 form-label">Office Hour</label>
                            <div class="col-md-9">
                                <input class="form-control" id="officeHour" name="office_hour" placeholder="e.g. 9am - 10pm" type="text">
                                <span class="text-danger">{{ $errors->has('office_hour') ?  $errors->first('office_hour') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="facebookUrl" class="col-md-3 form-label">Facebook URL</label>
                            <div class="col-md-9">
                                <input class="form-control" id="facebookUrl" name="facebook_url" placeholder="e.g. facebook.com/page_name" type="url">
                                <span class="text-danger">{{ $errors->has('facebook_url') ?  $errors->first('facebook_url') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="xUrl" class="col-md-3 form-label">X URL</label>
                            <div class="col-md-9">
                                <input class="form-control" id="xUrl" name="x_url" placeholder="e.g. x.com/page_name" type="url">
                                <span class="text-danger">{{ $errors->has('x_url') ?  $errors->first('x_url') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="linkedinUrl" class="col-md-3 form-label">Linkedin URL</label>
                            <div class="col-md-9">
                                <input class="form-control" id="linkedinUrl" name="linkedin_url" placeholder="e.g. linkedin.com/page_name" type="url">
                                <span class="text-danger">{{ $errors->has('linkedin_url') ?  $errors->first('linkedin_url') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="instagramUrl" class="col-md-3 form-label">Instagram URL</label>
                            <div class="col-md-9">
                                <input class="form-control" id="instagramUrl" name="instagram_url" placeholder="e.g. instagram.com/page_name" type="url">
                                <span class="text-danger">{{ $errors->has('instagram_url') ?  $errors->first('instagram_url') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Google Map API</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="google_map_api_url" id="" placeholder="key: 15xC2dai**************"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="adnriodAppImage" class="col-md-3 form-label">Andriod App Image</label>
                            <div class="col-md-9">
                                <input id="adnriodAppImage" class="form-control" name="adnriod_app_image" type="file">
                                <img id=""  />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="adnriodAppImage" class="col-md-3 form-label">Andriod App Image</label>
                            <div class="col-md-9">
                                <input id="adnriodAppImage" class="form-control" name="adnriod_app_image" type="file">
                                <img id=""  />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="favicon" class="col-md-3 form-label">Favicon</label>
                            <div class="col-md-9">
                                <input id="favicon" class="form-control" name="favicon" type="file">
                                <img id=""  />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="logo" class="col-md-3 form-label">Site Logo</label>
                            <div class="col-md-9">
                                <input id="logo" class="form-control" name="logo" type="file">
                                <img id=""  />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="logoTransparent" class="col-md-3 form-label">Site Transparent Logo</label>
                            <div class="col-md-9">
                                <input id="logoTransparent" class="form-control" name="logo_tranparent" type="file">
                                <img id=""  />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="payment_methods_image" class="col-md-3 form-label">Payment Methods Images</label>
                            <div class="col-md-9">
                                <input id="payment_methods_image" class="form-control" name="payment_methods_image" type="file">
                                <img id=""  />
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Setting Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

