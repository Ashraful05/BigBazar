@extends('admin.master')
@section('title','Report Page')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h4>Search Report</h4>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card pd-20 pd-sm-40">
                        <div class="table-wrapper">
                            <div class="modal-body pd-20">
                                <form action="{{ route('search-by-date') }}" method="post" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Search By Date</label>
                                        <input type="date" name="date" value="" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Date</button>
                                </form>
                            </div>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>
                <div class="col-lg-4">
                    <div class="card pd-20 pd-sm-40">
                        <div class="table-wrapper">
                            <div class="modal-body pd-20">
                                <form action="{{ route('search-by-month') }}" method="post" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Search By Month</label>
                                        <select id="" class="form-control" name="month">
                                            <option value="january" name="">january</option>
                                            <option value="february" name="">february</option>
                                            <option value="march" name="">march</option>
                                            <option value="april" name="">april</option>
                                            <option value="may" name="">may</option>
                                            <option value="june" name="">june</option>
                                            <option value="july" name="">july</option>
                                            <option value="august" name="">august</option>
                                            <option value="september" name="">september</option>
                                            <option value="october" name="">october</option>
                                            <option value="november" name="">november</option>
                                            <option value="december" name="">december</option>

                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->

                </div>
                <div class="col-lg-4">
                    <div class="card pd-20 pd-sm-40">
                        <div class="table-wrapper">
                            <div class="modal-body pd-20">
                                <form action="{{ route('search-by-year') }}" method="post" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Search By Year</label>
                                        <select name="year" id="" class="form-control">
                                            <option value="2018" name="">2018</option>
                                            <option value="2019" name="">2019</option>
                                            <option value="2020" name="">2020</option>
                                            <option value="2021" name="">2021</option>
                                            <option value="2022" name="">2022</option>
                                            <option value="2023" name="">2023</option>
                                            <option value="2024" name="">2024</option>
                                            <option value="2025" name="">2025</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->

                </div>

            </div>




        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection

