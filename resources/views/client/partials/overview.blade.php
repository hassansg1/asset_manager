<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="initials_circle profile-user-wid mb-4">
                            {{ $item->initials }}
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="font-size-20 fw-300 text-truncate">{{ $item->first_name }} {{ $item->last_name }}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="font-size-15 fw-300"><i
                                            class="fas fa-phone-alt"></i> {{ $item->mobile_no }}
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="font-size-15 fw-300"><i
                                            class="fas fa-envelope"></i> {{ $item->email }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="border-left: 1px solid" class="col-xl-6">
                <div class="row">
                    <div style="margin-top: 50px" class="col-sm-12">
                        Balance: $0.00 Credit
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12">
                <div class="card-body">
                    <h5 class="">Most Recent Transactions</h5>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>Date and Time</th>
                                <th>Services</th>
                                <th>Employees</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="card-body">
                    <h5 class="">Upcoming Appointments</h5>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>Date and Time</th>
                                <th>Services</th>
                                <th>Employees</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
