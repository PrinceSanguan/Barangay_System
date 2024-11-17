

@extends('layouts.app')

@section('content')
<div class="container py-5" style="margin-top: 100px;">
   
    <!-- Citizens Charter Section -->
   <section id="citizens-charter">
        {{-- <h2>Citizens Charter </h2> --}}
        <div class="section-title">
            <h2>CITIZENS CHARTER</h2>
            <p>Pursuant to Section 6 of R.A 9485</p>
            <h4>VISION: Centro 2: An exemplar Barangay with unified, disciplined, and God-loving constituents towards prosperity</h4>
            <h4>MISSION: To provide satisfactory services through democratic leadership that would enable the people to become politically responsible, morally upright, and economically capable</h4>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>BARANGAY OFFICIAL</th>
                    <th>FRONTLINE SERVICES</th>
                    <th>STEP / PROCEDURES</th>
                    <th>RESPONSIBLE PERSON</th>
                    <th>MAXIMUM RESPONSE TIME</th>
                    <th>REQUIREMENTS</th>
                    <th>AMOUNT OF FEES</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr>
                    <td>Camilo P. Perdido<br>Punong Barangay</td>
                    <td>ISSUANCE OF CLEARANCES AND CERTIFICATE (CTC)</td>
                    <td>
                        1. Filling-up of Request Slip<br>
                        2. Receiving/Recording of request<br>
                        3. Issuance/Approval of CTC
                    </td>
                    <td>Officer of the Day<br>Barangay Secretary<br>Barangay Treasurer</td>
                    <td>
                        5 minutes<br>
                        3 minutes<br>
                        2 minutes
                    </td>
                    <td>None</td>
                    <td>P5.00 Basic Tax plus 0.001 of his/her preceding annual income</td>
                </tr>

                <!-- Row 2 -->
                <tr>
                    <td>Vicky C. Fuertes<br>Chairman - Peace & Order</td>
                    <td>ISSUANCE OF CLEARANCES AND CERTIFICATIONS</td>
                    <td>
                        1. Filling-up of Request Slip<br>
                        2. Receiving/Recording of request<br>
                        3. Approval/Release of document
                    </td>
                    <td>Barangay Secretary<br>Barangay Treasurer</td>
                    <td>
                        5 minutes<br>
                        2 minutes<br>
                        3 minutes
                    </td>
                    <td>Barangay Clearance</td>
                    <td>P100.00 - P200.00</td>
                </tr>

                <!-- Row 3 -->
                <tr>
                    <td>Recto S. Obispo<br>Chairman - Facilities & Public Utilities</td>
                    <td>FILING OF SUMMONS</td>
                    <td>
                        1. Filing of Complaint Form<br>
                        2. Approval of the request<br>
                        3. Scheduling of hearings
                    </td>
                    <td>Punong Barangay</td>
                    <td>10 minutes</td>
                    <td>CTC</td>
                    <td>P100.00</td>
                </tr>

                <!-- Row 4 -->
                <tr>
                    <td>Andrew L. Pagayatan<br>Chairman - Public Works & Highways</td>
                    <td>ISSUANCE OF PERMIT</td>
                    <td>
                        1. Filling-up of Request Slip<br>
                        2. Receiving/Recording of request<br>
                        3. Processing of requested permit<br>
                        4. Paying of fees<br>
                        5. Approving/Issuing of requested document
                    </td>
                    <td>Barangay Secretary<br>Barangay Treasurer</td>
                    <td>
                        3 minutes<br>
                        2 minutes<br>
                        10 minutes<br>
                        3 minutes<br>
                        2 minutes
                    </td>
                    <td>Barangay Clearance</td>
                    <td>P200.00</td>
                </tr>

                <!-- Row 5 -->
                <tr>
                    <td>Alfonso S. Grande Jr.<br>Chairman - Peace & Order and Public Safety</td>
                    <td>HEALTH SERVICES</td>
                    <td>
                        1. Filling-up of Request Slip<br>
                        2. Evaluation of request<br>
                        3. Check-up (if medical attention required)
                    </td>
                    <td>Barangay Health Workers</td>
                    <td>5 minutes</td>
                    <td>CTC</td>
                    <td>FREE</td>
                </tr>
                <!-- Add more rows as necessary -->
            </tbody>
        </table>
        <p>Note: Each frontline service shall be given two (2) days processing time extension.</p>
    </div>
    </section> 
</div>
@endsection