@extends('layouts.user')

@section('content')

                <div id="check2" class="hidden">

                    <h3>Shipping Address Informations</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="shipping_name">Shipping Name: *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control inputs" id="shipping_name" value="Maniruzzaman Akash" placeholder="Enter Your Shipping Name"  required/> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="shipping_contact">Shipping Contact: *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control inputs" value="+8801951233084" id="shipping_contact" placeholder="Enter Your Shipping Contact No"  required/> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="shipping_primary_address">Shipping Primary Address: *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control inputs" id="shipping_primary_address" placeholder="Enter Your Shipping primary Address" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="shipping_secondary_address">Shipping secondary Address:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control inputs" id="shipping_secondary_address" placeholder="Enter Your Shipping Secondary or optional Address" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="shipping_nearest_city">Select Nearest state: *</label>
                        <div class="col-sm-10">
                            <select name="state" class="form-control inputs"  id="shipping_nearest_city" required>
                                <option value="">Select a state</option>
                                <option value="London">London</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Mymensingh">Mymensingh</option>
                                <option value="Patuakhali">Patuakhali</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input type="button" class="btn btn-info pull-right  margin-top-20 checkbtn2" name="submit_check2" value="Next..."/>

                            <input type="button" class="btn btn-danger pull-right  margin-top-20 margin-right-20 backToCheck1" name="backToCheck1" value="Back"/>
                            <div class="clearfix"></div> 
                        </div>
                    </div>
                </div> <!-- End check2 -->
                <div id="check3" class="hidden">

@endsection  