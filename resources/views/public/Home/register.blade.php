@include('public.Home.header')
<div class="container mt-5 data-policy-box">
    <h3 class="text-bold m-2">REGISTRATION <span style="font-weight:normal">Data Policy Agreement</span></h3>
    <div class="container-fluid">
        <div class="bg-light p-3 d-flex flex-column justify-content-center align-items-center border">
            <h5 class="dpa-text-h3">Saint Paul University Philippines</h5>
            <h5 class="dpa-text-h3">Privacy Information For Alumni</h5>
        </div>
        <div class="container-dpa p-3 p-4 border ">
            <h6>St. Paul University Philippines (SPUP),
                a Catholic institution in the Philippines, places great importance on safeguarding the personal privacy
                of its stakeholders. As part of its commitment, SPUP collects and manages personal information for
                specific and necessary purposes, ensuring compliance with data protection laws.</h6>
            <h6 class="text-bold py-2">Overview</h6>
            <ul>
                <li>Information Collection</li>
                <li>Purpose of Data Processing</li>
                <li>Data Utilization</li>
                <li>Marketing Communications</li>
                <li>Information Sharing</li>
                <li>Research Collaboration</li>
                <li>External Agencies and Legal Requirements</li>
                <li>Your Choices and Obligations</li>
                <li>Security Measures</li>
            </ul>
            <h6 class="text-bold">Here are the key points regarding SPUP’s privacy policy:</h6>
            <ol>
                <li class="text-bold">Information Collection:</li>
                <ul>
                    <li>SPUP collects relevant personal information through the Paulinian Alumni Information System
                        (PAIS).</li>
                    <li>This data includes details from your SPUP Entrance Test (SPUPET) application and your admission
                        as a student.</li>
                    <li>Additional information related to your employment history, graduate degrees, awards, and
                        recognitions is also collected.</li>
                </ul>
                <li class="text-bold">Purpose of Data Processing:</li>
                <ul>
                    <li>SPUP uses this data to assess the attainment of graduate outcomes for its alumni.</li>
                    <li>Graduate outcomes include employment, promotions, and recognition.</li>
                    <li>The data also supports educational research and quality assurance efforts.</li>
                    <li>By analyzing graduate employability, employment patterns, and other factors, SPUP ensures
                        program relevance and responsiveness.</li>
                </ul>
                <li class="text-bold">Data Utilization:</li>
                <ul>
                    <li>SPUP may contact you as an alumnus regarding relevant matters.</li>
                    <li>Aggregate data analytics are conducted, comparing trends across academic terms.</li>
                    <li>Predictive and prescriptive analytics inform future program decisions.</li>
                    <li>Alumni information is retained indefinitely to facilitate academic record updates.</li>
                </ul>
                <li class="text-bold">Marketing Communications:</li>
                <ul>
                    <li>SPUP may use your personal information and contact details to share information about continuing
                        professional development (CPD) programs and graduate offerings.</li>
                    <li>You have the option to opt out of receiving such marketing communications.</li>
                </ul>
                <li class="text-bold">Information Sharing:</li>
                <ul>
                    <li>The Office of Alumni Relations at SPUP serves as the Personal Information Controller (PIC) for
                        all alumni data.</li>
                    <li>The relevant academic unit overseeing your program has access to your personal information,
                        specifically monitoring your graduate outcomes post-graduation.</li>
                </ul>
                <li class="text-bold">Research Collaboration:</li>
                <ul>
                    <li>With the permission of SPUP’s Data Protection Officer (DPO) and adherence to research ethics and
                        data privacy, the PIC may share depersonalized information with academic researchers.</li>
                    <li>Measures are in place to prevent individual identification.</li>
                    <li>You have the option to decline granting access to your personal information for external
                        research purposes.</li>
                </ul>
                <li class="text-bold">External Agencies and Legal Requirements:</li>
                <ul>
                    <li>Upon your request, SPUP may share your personal and academic data with external agencies.</li>
                    <li>These agencies evaluate your credentials for employment or further studies.</li>
                    <li>SPUP may share data when legally required or to protect rights and security.</li>
                    <li>Regulatory agencies (e.g., CHED, LEB, DepEd) and accrediting bodies (e.g., PACUCOA, PAASCU) may also necessitate data sharing for monitoring and evaluation.</li>
                </ul>
                <li class="text-bold">Your Choices and Obligations:</li>
                <ul>
                    <li>You can opt out of using your personal information for institutional marketing or external research.</li>
                    <li>Ensure accuracy and completeness of information provided to SPUP.</li>
                    <li>Deliberate provision of fraudulent information may impact admission.</li>
                </ul>
                <li class="text-bold">Security Measures:</li>
                <ul>
                    <li>SPUP implements safeguards to protect your data.</li>
                    <li>Regular system monitoring prevents vulnerabilities and attacks.</li>
                </ul>
            </ol>
            <h6>Remember that SPUP handles your data responsibly and in accordance with privacy laws. If you have any specific concerns or preferences, feel free to communicate them with the University. Your privacy matters!</h6>
        </div>
        <div class="border p-3">
            <p class="mx-2"><span><input type="checkbox" id="checkbox1" style="margin-right: 5px" required></span>I have read,
                understood, and agree to the Privacy Information for Alumni.</p>
            <p class="mx-2"><span><input type="checkbox" id="checkbox2" style="margin-right: 5px" required></span>I agree to use of
                my personal information for marketing purposes of University services.</p>
            <p class="mx-2"><span><input type="checkbox" id="checkbox3" style="margin-right: 5px" required></span>I agree to share my
                depersonalized information to academic researchers who may request for such, instituting measures that
                will not allow me to be individually identified.</p>

            <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-outline-secondary"><i class="fa-solid fa-xmark"></i> Cancel</button>
                <button class="btn btn-success"onclick="registerForm()">Next <i class="fa-solid fa-angle-right"></i></button>
            </div>
        </div>
    </div>

</div>
{{-- @include('public.Home.contact') --}}
@include('public.Home.footer')

<script>
    function registerForm(){
        let checkbox1 = document.getElementById('checkbox1').checked;
        let checkbox2 = document.getElementById('checkbox2').checked;
        let checkbox3 = document.getElementById('checkbox3').checked;
        // alert(checkbox1)
        if(checkbox1 == true && checkbox2 == true && checkbox3 == true){
            window.location.href = "{{ route('register-form')}}";
        }else{
            errorToast('Check all check boxes.');
        }
    }
</script>
