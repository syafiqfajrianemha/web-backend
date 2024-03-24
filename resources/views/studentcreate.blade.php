@extends('layouts.main')

@section('title', 'Create Student')

@include('layouts.navbar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="{{ route('student') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i></a>
                        <h5 class="text-center d-block">
                            Create <span class="text-primary">Student</span>
                        </h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('student.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                    name="nim" value="{{ old('nim') }}" autocomplete="off" required>
                                @error('nim')
                                    <div id="nim" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" autocomplete="off" required>
                                @error('name')
                                    <div id="name" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                        id="male"{{ old('gender') == 'Male' ? ' checked' : '' }} value="Male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                        id="female"{{ old('gender') == 'Female' ? ' checked' : '' }} value="Female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                @error('gender')
                                    <small id="gender" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="major">Major</label>
                                <select class="form-control @error('major') is-invalid @enderror" id="major"
                                    name="major">
                                    <option selected disabled>Choose a Major</option>
                                    <option
                                        value="Informatics Engineering"{{ old('major') == 'Informatics Engineering' ? ' selected' : '' }}>
                                        Informatics Engineering
                                    </option>
                                    <option
                                        value="Civil Engineering"{{ old('major') == 'Civil Engineering' ? ' selected' : '' }}>
                                        Civil Engineering
                                    </option>
                                    <option
                                        value="Technical Electro"{{ old('major') == 'Technical Electro' ? ' selected' : '' }}>
                                        Technical Electro
                                    </option>
                                    <option
                                        value="Chemical Engineering"{{ old('major') == 'Chemical Engineering' ? ' selected' : '' }}>
                                        Chemical Engineering
                                    </option>
                                    <option
                                        value="Mechanical Engineering"{{ old('major') == 'Mechanical Engineering' ? ' selected' : '' }}>
                                        Mechanical Engineering
                                    </option>
                                </select>
                                @error('major')
                                    <div id="major" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="d-block">Expertise</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        id="networking"@if (is_array(old('expertise')) && in_array('Networking', old('expertise'))) checked @endif value="Networking"
                                        name="expertise[]">
                                    <label class="form-check-label" for="networking">Networking</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        id="webProgramming"@if (is_array(old('expertise')) && in_array('Web Programming', old('expertise'))) checked @endif
                                        value="Web Programming" name="expertise[]">
                                    <label class="form-check-label" for="webProgramming">Web Programming</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        id="mobileProgramming"@if (is_array(old('expertise')) && in_array('Mobile Programming', old('expertise'))) checked @endif
                                        value="Mobile Programming" name="expertise[]">
                                    <label class="form-check-label" for="mobileProgramming">Mobile Programming</label>
                                </div>
                                @error('expertise')
                                    <small id="expertise" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush
