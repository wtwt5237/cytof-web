<!doctype html>
<html lang="en">

<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GKJXGKMXES"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-GKJXGKMXES');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CytofDR</title>

    <!--    <link rel="stylesheet" href="css/jquery.dataTables.min.css">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-multiselect.min.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/fixedColumns.dataTables.min.css">

    <link rel="stylesheet" href="css/custom.css">

</head>

<body>

    <?php include 'header.php' ?>

    <div style="margin-top: 80px">
        <div class="row w-100">
            <div class="col-12 col-md-3 left_section">
                <div class="card">
                    <div class="card-header">
                        <div>Input Parameters</div>
                    </div>
                    <div class="card-body">
                        <div>
                            <form action="result.php" method="post" enctype="multipart/form-data">
                                <!-- Real/Simulation -->
                                <div class="mb-2">
                                    <label for="real_search" class="form-label">Real/Simulation</label>
                                    <select id="real_search" multiple="multiple" name="real[]" required>
                                        <option value="Real">Real</option>
                                        <option value="Simulation">Simulation</option>
                                    </select>
                                </div>
                                <!-- tissue type -->
                                <div class="mb-2">
                                    <label for="tissue_search" class="form-label">Tissue/Disease</label>
                                    <select id="tissue_search" multiple="multiple" name="tissue[]" required>
                                        <option value="Breast cancer">Breast cancer</option>
                                        <option value="Brain">Brain</option>
                                        <option value="Peripheral blood of COVID-19 vaccinee">Peripheral blood of COVID-19
                                            vaccinee
                                        </option>
                                        <option value="Peanut-allergic patients">Peanut-allergic patients</option>
                                        <option value="Bone marrow">Bone marrow</option>
                                        <option value="Lacrimal glands">Lacrimal glands</option>
                                        <option value="Peripheral blood of lung cancer patients">Peripheral blood of lung
                                            cancer patients
                                        </option>
                                        <option value="Melanoma">Melanoma</option>
                                        <option value="Simulation">Simulation</option>
                                    </select>
                                </div>
                                <!-- Method -->
                                <div class="mb-2">
                                    <label for="method_search" class="form-label">Method</label>
                                    <select id="method_search" multiple="multiple" name="method[]" required>
                                        <option value="DiffMap">DiffMap</option>
                                        <option value="PHATE">PHATE</option>
                                        <option value="UMAP">UMAP</option>
                                        <option value="SQuaD-MDS Hybrid">SQuaD-MDS Hybrid</option>
                                        <option value="SQuaD-MDS">SQuaD-MDS</option>
                                        <option value="Spectral">Spectral</option>
                                        <option value="tSNE (sklearn)">tSNE (sklearn)</option>
                                        <option value="scvis">scvis</option>
                                        <option value="scvis (Full)">scvis (Full)</option>
                                        <option value="SAUCIE">SAUCIE</option>
                                        <option value="PCA">PCA</option>
                                        <option value="FA">FA</option>
                                        <option value="tSNE">tSNE</option>
                                        <option value="NMF">NMF</option>
                                        <option value="LLE">LLE</option>
                                        <option value="KPCA RBF">KPCA RBF</option>
                                        <option value="KPCA Poly">KPCA Poly</option>
                                        <option value="Isomap">Isomap</option>
                                        <option value="ICA">ICA</option>
                                        <option value="GrandPrix">GrandPrix</option>
                                        <option value="ZIFA">ZIFA</option>
                                    </select>
                                </div>
                                <!-- Category -->
                                <div class="mb-2">
                                    <label for="category_search" class="form-label">Category</label>
                                    <select id="category_search" multiple="multiple" name="category[]" required>
                                        <option value="Linear">Linear</option>
                                        <option value="Nonlinear">Nonlinear</option>
                                    </select>
                                </div>
                                <!-- Platform -->
                                <div class="mb-2">
                                    <label for="platform_search" class="form-label">Platform</label>
                                    <select id="platform_search" multiple="multiple" name="platform[]" required>
                                        <option value="R">R</option>
                                        <option value="Python">Python</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <!-- Metrics -->
                                <div class="mb-2">
                                    <label for="metrics_search" class="form-label">Metrics</label>
                                    <select id="metrics_search" multiple="multiple" name="metrics[]" required>
                                        <option value="Global">Global</option>
                                        <option value="Local">Local</option>
                                        <option value="Downstream">Downstream</option>
                                        <option value="scRNA Concordance">scRNA Concordance</option>
                                        <option value="Stability">Stability</option>
                                        <option value="Scalability">Scalability</option>
                                        <option value="Usability">Usability</option>
                                    </select>
                                </div>
                                <!-- Cell Number -->
                                <div class="mb-2">
                                    <label for="number_search" class="form-label">Cell Number</label>
                                    <select id="number_search" multiple="multiple" name="number[]" required>
                                        <option value="0,10000">
                                            <= 10,000</option>
                                        <option value="10001,100000">10,001 - 100,000</option>
                                        <option value="100001,200000">100,001 - 200,000</option>
                                        <option value="200001,300000">200,001 - 300,000</option>
                                        <option value="300001,400000">300,001 - 400,000</option>
                                        <option value="400001,500000">400,001 - 500,000</option>
                                        <option value="500001,10000000000">> 500,000</option>
                                    </select>
                                </div>
                                <!-- Features -->
                                <div class="mb-4">
                                    <label for="feature_search" class="form-label">Protein Feature Number</label>
                                    <select id="feature_search" multiple="multiple" name="feature[]" required>
                                        <option value="0,30">
                                            <= 30</option>
                                        <option value="31,35">31 - 35</option>
                                        <option value="36,40">36 - 40</option>
                                        <option value="41,50">41 - 50</option>
                                        <option value="51,60">51 - 60</option>
                                    </select>
                                </div>
                                <!-- Button -->
                                <button class="btn btn-success" type="submit" style="width: 100%">Search<i
                                        class="fas fa-search ms-1"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card lab_info mt-3">
                    <div class="card-body" style="padding: .5rem 1rem">
                        <a href="https://qbrc.swmed.edu/labs/wanglab/" class="lab d-block mb-1">Dr. Tao Wang Lab<i
                                class="fas fa-external-link-alt ms-2"></i></a>
                        <a href="https://people.smu.edu/swang/" class="lab d-block mb-1">Dr. Xinlei (Sherry) Wang Lab<i
                                class="fas fa-external-link-alt ms-2"></i></a>
                        <a href="https://dbai.biohpc.swmed.edu/" class="lab d-block">Database for Actionable Immunology
                            (DBAI)<i
                                class="fas fa-external-link-alt ms-2"></i></a>
                        <a href="license.txt" class="lab d-block">Terms and Conditions</a>
                    </div>
                </div>
            </div>
            <div class="right_section">
                <div class="row">
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                        <button class="card card-header" id="hideShow_btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse_hideShow" style="width: 100%">
                            <span>Show/Hide Columns <i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="collapse" id="collapse_hideShow">
                            <div class="card card-body">
                                <div class="fw-bold fst-italic">Data</div>
                                <label><input class="input" type="checkbox" value="0" checked> Sample</label>
                                <label><input class="input" type="checkbox" value="1" checked> Cell Number</label>
                                <label><input class="input" type="checkbox" value="2" checked> Protein Feature
                                    Number</label>
                                <label><input class="input" type="checkbox" value="3" checked> Tissue/Disease</label>
                                <label><input class="input" type="checkbox" value="4"> Data</label>
                                <label><input class="input" type="checkbox" value="5"> Publication</label>
                                <label><input class="input" type="checkbox" value="18"> Cell Typing</label>
                                <label><input class="input" type="checkbox" value="19"> Matched scRNA</label>
                                <hr>
                                <div class="fw-bold fst-italic">Evaluation Metrics</div>
                                <div class="fst-italic">(For detailed explanation of the metrics, please refer to Sup. Table
                                    3 of our paper)
                                </div>
                                <label><input class="input" type="checkbox" value="6" checked> Method</label>
                                <label><input class="input" type="checkbox" value="7"> Error</label>
                                <label><input class="input" type="checkbox" value="8"> Forced Downsample</label>
                                <label><input class="input" type="checkbox" value="20" checked> Category</label>
                                <label><input class="input" type="checkbox" value="21"> Purpose</label>
                                <label><input class="input" type="checkbox" value="22" checked> Platform</label>
                                <label><input class="input" type="checkbox" value="23" checked> Package</label>
                                <label><input class="input" type="checkbox" value="24"> Documentation</label>
                                <label><input class="input" type="checkbox" value="25"> CI/CD</label>
                                <label><input class="input" type="checkbox" value="26"> Update</label>
                                <label><input class="input" type="checkbox" value="27"> Cross Platform</label>
                                <label><input class="input" type="checkbox" value="28"> Matrix</label>
                                <label><input class="input" type="checkbox" value="29"> Import</label>
                                <label><input class="input" type="checkbox" value="30"> Open Source</label>
                                <label><input class="input" type="checkbox" value="31"> CLI</label>
                                <label><input class="input" type="checkbox" value="32"> Builtin</label>
                                <label><input class="input" type="checkbox" value="33"> Mapping</label>
                                <label><input class="input" type="checkbox" value="34"> Robust</label>
                                <label><input class="input" type="checkbox" value="35" checked> Speed</label>
                                <label><input class="input" type="checkbox" value="36" checked> Memory</label>
                                <label><input class="input" type="checkbox" value="37" checked> Simulated Trees</label>
                                <label><input class="input" type="checkbox" value="38" checked> Simulated Cell Types</label>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3 mt-md-0">
                        <button class="card card-header" id="ranking_btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse_ranking" style="width: 100%">
                            <span>Rank <i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="collapse" id="collapse_ranking">
                            <div class="card card-body">
                                <div id="ranking">
                                    <!-- table-->
                                    <table id="table_id_2" class="table text-center nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Position</th>
                                                <th scope="col">Method</th>
                                                <th scope="col" style="background-color: orange">Average of Chosen Metrics</th>
                                                <th scope="col">Accuracy</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="preloader text-center" style="margin-top: 200px">
                    <div class="spinner-border" style="width: 10rem; height: 10rem;" role="status"></div>
                </div>

                <!-- table-->
                <div class="mt-3">
                    <table id="table_id" class="nowrap row-border" style="width: 100% !important;" />
                </div>

            </div>
        </div>
    </div>

    <!-- javascript
  ================================================== -->
    <!-- Placed at the end of the document so the page loads faster -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/popper.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <!--<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>-->
    <!--<script src="js/jquery.dataTables.min.js"></script>-->

    <script src="js/fontawesome.min.js"></script>

    <script src="js/natural.js"></script>
    <script src="js/fixedColumns.dataTables.js"></script>

    <script type="text/javascript" src="js/bootstrap-multiselect.min.js"></script>

    <!--<script src="json/test.json"></script>-->

    <script>
        $(window).on('load', function() {
            $('.preloader').hide(1000);
        });
    </script>

    <!-- Initialize tooltip, popover and modal -->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <!-- Initialize the multi-select plugin: -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#real_search, #tissue_search, #category_search, #platform_search, #metrics_search, #number_search, #feature_search').multiselect({
                buttonClass: 'form-select',
                templates: {
                    button: '<button type="button" class="multiselect dropdown-toggle" data-bs-toggle="dropdown">' +
                        '<span class="multiselect-selected-text"></span></button>',
                },
                maxHeight: 300,
                includeSelectAllOption: true,
                buttonWidth: '100%',
                widthSynchronizationMode: 'ifPopupIsSmaller',
            });

            $('#method_search').multiselect({
                buttonClass: 'form-select',
                templates: {
                    button: '<button type="button" class="multiselect dropdown-toggle" data-bs-toggle="dropdown">' +
                        '<span class="multiselect-selected-text"></span></button>',
                },
                maxHeight: 300,
                includeSelectAllOption: true,
                enableFiltering: true,
                buttonWidth: '100%',
                widthSynchronizationMode: 'ifPopupIsSmaller',
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $.getJSON("json/data.json", function(dataSet) {
                const table = $('#table_id').DataTable({
                    data: dataSet,
                    columns: [{
                            data: 'Sample',
                            title: 'Sample'
                        },
                        {
                            data: 'Cell Number',
                            title: 'Cell Number'
                        },
                        {
                            data: 'Features',
                            title: 'Protein Feature Number'
                        },
                        {
                            data: 'Tissue_Disease',
                            title: 'Tissue/Disease'
                        },
                        {
                            data: null,
                            title: 'Data',
                            render: function(data) {
                                return '<a href=' + data['Data'] + '><i class=\'fa fa-link\'></i></a>';
                            }
                        },
                        {
                            data: null,
                            title: 'Publication',
                            render: function(data) {
                                return '<a href=' + data['Publication'] + '><i class=\'fa fa-link\'></i></a>';
                            }
                        },
                        {
                            data: 'Method',
                            title: 'Method'
                        },
                        {
                            data: 'Error',
                            title: 'Error'
                        },
                        {
                            data: 'Forced Downsample',
                            title: 'Forced Downsample'
                        },
                        {
                            data: null,
                            title: '<div style="padding: 0 20px">Accuracy <i class="fas fa-question-circle" data-bs-toggle="tooltip" ' +
                                'title="Average of Global, Local, Downstream and scRNA Concordance"></i></div>',
                            render: function(data) {
                                if (typeof data['Accuracy'] !== 'number') {
                                    return '<div class="d-none"><div>0</div></div>' + '<i class="fas fa-exclamation-triangle"></i> ERROR';
                                }
                                if (data['Accuracy'] === 'NA') {
                                    return '<div class="d-none">0</div><div>NA</div>';
                                }

                                let avg_value = data['Accuracy'];
                                let bar_value = avg_value.toFixed(2) * 4 + 10;
                                return '<div class="progress" data-bs-toggle="tooltip" data-bs-placement="right" title="' + bar_value +
                                    '%"><div class="progress-bar progress-bar-striped" role="progressbar" style="width:' + bar_value +
                                    '%; background-color: rgba(255, 165, 0,' + bar_value + '%)" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">' +
                                    avg_value.toFixed(2) + '</div></div>';
                            }
                        },
                        {
                            data: null,
                            title: 'Average of Chosen Metrics',
                            render: function(data) {
                                if (data['Accuracy'] === 'ERROR') {
                                    return '<div class="d-none"><div>0</div></div>' + '<i class="fas fa-exclamation-triangle"></i> ERROR';
                                }
                                if (data['Accuracy'] === 'NA') {
                                    return '<div class="d-none">0</div><div>NA</div>';
                                }

                                let avg_value = (data['Accuracy'] + data['Stability'] + data['Scalability'] + data['Usability']) / 4;
                                let bar_value = avg_value.toFixed(2) * 4 + 10;
                                return '<div class="progress" data-bs-toggle="tooltip" data-bs-placement="right" title="' + bar_value +
                                    '%"><div class="progress-bar progress-bar-striped" role="progressbar" style="width:' + bar_value +
                                    '%; background-color: rgba(255, 165, 0,' + bar_value + '%)" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">' +
                                    avg_value.toFixed(2) + '</div></div>';
                            }
                        },
                        {
                            data: null,
                            title: 'Global',
                            render: function(data) {
                                return data['Global'] === 'ERROR' ? '<div class="d-none">0</div>' +
                                    '<i class="fas fa-exclamation-triangle"></i> ERROR' : '<div>' + data['Global'] + '</div>';
                            }
                        },
                        {
                            data: null,
                            title: 'Local',
                            render: function(data) {
                                return data['Local'] === 'ERROR' ? '<div class="d-none">0</div>' +
                                    '<i class="fas fa-exclamation-triangle"></i> ERROR' : '<div>' + data['Local'] + '</div>';
                            }
                        },
                        {
                            data: null,
                            title: 'Downstream',
                            render: function(data) {
                                if (data['Downstream'] === 'ERROR') {
                                    return '<div class="d-none"><div>0</div></div>' + '<i class="fas fa-exclamation-triangle"></i> ERROR';
                                }
                                if (data['Downstream'] === 'NA') {
                                    return '<div class="d-none">0</div><div>NA</div>';
                                }

                                return '<div>' + data['Downstream'].toFixed(2) + '</div>';
                            }
                        },
                        {
                            data: null,
                            title: 'scRNA Concordance',
                            render: function(data) {
                                if (data['scRNA Concordance'] === 'ERROR') {
                                    return '<div class="d-none">0</div>' + '<i class="fas fa-exclamation-triangle"></i> ERROR';
                                }
                                if (data['scRNA Concordance'] === 'NA') {
                                    return '<div class="d-none">0</div><div>NA</div>';
                                }
                                return '<div>' + data['scRNA Concordance'] + '</div>';
                            }
                        },
                        {
                            data: null,
                            title: 'Stability',
                            render: function(data) {
                                return data['Stability'] === 'ERROR' ? '<div class="d-none">0</div>' +
                                    '<i class="fas fa-exclamation-triangle"></i> ERROR' : '<div>' + data['Stability'] + '</div>';
                            }
                        },
                        {
                            data: null,
                            title: 'Scalability',
                            render: function(data) {
                                return data['Scalability'] === 'ERROR' ? '<div class="d-none">0</div>' +
                                    '<i class="fas fa-exclamation-triangle"></i> ERROR' : '<div>' + data['Scalability'].toFixed(2) + '</div>';
                            }
                        },
                        {
                            data: null,
                            title: 'Usability',
                            render: function(data) {
                                return data['Usability'] === 'ERROR' ? '<div class="d-none">0</div>' +
                                    '<i class="fas fa-exclamation-triangle"></i> ERROR' : '<div>' + data['Usability'] + '</div>';
                            }
                        },
                        {
                            data: 'Labels',
                            title: 'Cell Typing'
                        },
                        {
                            data: 'Matched scRNA',
                            title: 'Matched scRNA'
                        },
                        {
                            data: 'Category',
                            title: 'Category'
                        },
                        {
                            data: 'Purpose',
                            title: 'Purpose'
                        },
                        {
                            data: 'Platform',
                            title: 'Platform'
                        },
                        {
                            data: null,
                            title: 'Package',
                            render: function(data) {
                                return '<a href=' + data['Package Link'] + '>' + data['Package'] + '</a>'
                            }
                        },
                        {
                            data: 'Documentation',
                            title: 'Documentation'
                        },
                        {
                            data: 'CI_CD',
                            title: 'CI/CD'
                        },
                        {
                            data: 'Update',
                            title: 'Update'
                        },
                        {
                            data: 'Cross Platform',
                            title: 'Cross Platform'
                        },
                        {
                            data: 'Matrix',
                            title: 'Matrix'
                        },
                        {
                            data: 'Import',
                            title: 'Import'
                        },
                        {
                            data: 'Open Source',
                            title: 'Open Source'
                        },
                        {
                            data: 'CLI',
                            title: 'CLI'
                        },
                        {
                            data: 'Builtin',
                            title: 'Builtin'
                        },
                        {
                            data: 'Mapping',
                            title: 'Mapping'
                        },
                        {
                            data: 'Robust',
                            title: 'Robust'
                        },
                        {
                            data: null,
                            title: '<div style="padding: 0 20px">Speed <i class="fas fa-question-circle" data-bs-toggle="tooltip" title="Unit: ms"></i></div>',
                            render: function(data) {
                                if (data['Speed'] === 'ERROR') {
                                    return '<div class="d-none">0</div><i class="fas fa-exclamation-triangle"></i> ERROR';
                                }
                                let value = Number(data['Speed']);
                                let bar_value = Math.log(value + 1) * 10 + 20;
                                return '<div class="progress" data-bs-toggle="tooltip" data-bs-placement="right" title="' + bar_value.toFixed(2) +
                                    '%"><div class="progress-bar progress-bar-striped" role="progressbar" style="width:' + bar_value +
                                    '%; background-color: rgba(100, 149, 237,' + bar_value + '%)" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">' +
                                    value.toFixed(2) + '</div></div>';
                            }
                        },
                        {
                            data: null,
                            title: '<div style="padding: 0 20px">Memory <i class="fas fa-question-circle" data-bs-toggle="tooltip" title="Unit: ms"></i></div>',
                            render: function(data) {
                                if (data['Memory'] === 'ERROR') {
                                    return '<div class="d-none">0</div><i class="fas fa-exclamation-triangle"></i> ERROR';
                                }
                                let value = Number(data['Memory']);
                                let bar_value = Math.log(value + 1) * 10 + 20;
                                return '<div class="progress" data-bs-toggle="tooltip" data-bs-placement="right" title="' + bar_value.toFixed(2) +
                                    '%"><div class="progress-bar progress-bar-striped" role="progressbar" style="width:' + bar_value +
                                    '%; background-color: rgba(100, 149, 237,' + bar_value + '%)" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">' +
                                    value.toFixed(2) + '</div></div>';
                            }
                        },
                        {
                            data: null,
                            title: 'Simulated Trees',
                            render: function(data) {
                                return data['Simulated Trees'] === 'NA' ? '<div class="d-none">0</div><div>NA</div>' : '<div>' + data['Simulated Trees'] + '</div>';
                            }
                        },
                        {
                            data: null,
                            title: 'Simulated Cell Types',
                            render: function(data) {
                                return data['Simulated Cell Types'] === 'NA' ? '<div class="d-none">0</div><div>NA</div>' : '<div>' + data['Simulated Cell Types'] + '</div>';
                            }
                        },
                    ],
                    ordering: true,
                    scrollX: true,
                    scrollY: "700px",
                    scrollCollapse: true,
                    dom: 't<"mt-0"p><"mt-2"l>',
                    aLengthMenu: [
                        [25, 50, 75, 100, -1],
                        [25, 50, 75, 100, "All"]
                    ],
                    iDisplayLength: 25,
                    columnDefs: [{
                            type: "natural",
                            targets: [1, 2, 9, 10, 11, 12, 13, 14, 15, 16, 17, 35, 36, 37, 38]
                        },
                        {
                            orderable: false,
                            targets: [0, 3, 4, 5, 6, 7, 8, 18, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34]
                        },
                        {
                            visible: false,
                            targets: [4, 5, 7, 8, 18, 19, 21, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34]
                        },
                        {
                            className: "text-center",
                            targets: [4, 5]
                        },
                        {
                            className: 'middle-bar',
                            targets: 10
                        },
                        {
                            className: "green",
                            targets: [0, 1, 2, 3, 4, 5, 18, 19]
                        },
                        {
                            className: "orange",
                            targets: [9, 10, 11, 12, 13, 14, 15, 16, 17]
                        },
                        {
                            className: "blue",
                            targets: [6, 7, 8, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38]
                        },
                    ],
                    order: [
                        [9, 'desc']
                    ],
                });

                $('.input').on('change', function() {

                    if ($(this).is(':checked')) {
                        table.column($(this).val()).visible(true);
                    } else {
                        table.column($(this).val()).visible(false);
                    }
                });

                const method_ranking = {
                    'DiffMap': [0, 0, 0, 0, 0],
                    'PHATE': [0, 0, 0, 0, 0],
                    'UMAP': [0, 0, 0, 0, 0],
                    'SQuaD-MDS Hybrid': [0, 0, 0, 0, 0],
                    'SQuaD-MDS': [0, 0, 0, 0, 0],
                    'Spectral': [0, 0, 0, 0, 0],
                    'tSNE (sklearn)': [0, 0, 0, 0, 0],
                    'scvis': [0, 0, 0, 0, 0],
                    'scvis (Full)': [0, 0, 0, 0, 0],
                    'SAUCIE': [0, 0, 0, 0, 0],
                    'PCA': [0, 0, 0, 0, 0],
                    'FA': [0, 0, 0, 0, 0],
                    'tSNE': [0, 0, 0, 0, 0],
                    'NMF': [0, 0, 0, 0, 0],
                    'LLE': [0, 0, 0, 0, 0],
                    'KPCA RBF': [0, 0, 0, 0, 0],
                    'KPCA Poly': [0, 0, 0, 0, 0],
                    'Isomap': [0, 0, 0, 0, 0],
                    'ICA': [0, 0, 0, 0, 0],
                    'GrandPrix': [0, 0, 0, 0, 0],
                    'ZIFA': [0, 0, 0, 0, 0],

                    // 'FIt-SNE': [0, 0, 0, 0, 0],
                    // 'MDS': [0, 0, 0, 0, 0],
                };

                $.each(dataSet, function(index, data) {
                    // console.log(data['Accuracy'], typeof data['Accuracy']);
                    if (typeof data['Accuracy'] === 'number') {
                        method_ranking[data['Method']][0] += 1;
                        method_ranking[data['Method']][1] += data['Accuracy'];
                        method_ranking[data['Method']][3] += (data['Accuracy'] + data['Stability'] + data['Scalability'] + data['Usability']) / 4;
                    }
                });

                $.each(method_ranking, function(key, value) {
                    value[2] = value[1] / value[0]; // average accuracy
                    value[4] = value[3] / value[0]; // average chosen metrics
                });

                let ranking_list = [];
                for (let method in method_ranking) {
                    if (method_ranking[method][1] !== 0) {
                        ranking_list.push([method, method_ranking[method]]);
                    }
                }
                ranking_list.sort(function(a, b) {
                    return b[1][4] - a[1][4];
                });

                $.each(ranking_list, function(index, value) {
                    if (index === 5) return false;
                    $('#table_id_2 tbody').append('<tr><td>' + Number(index + 1) + '</td><td>' + value[0] + '</td><td>' +
                        value[1][4].toFixed(2) + '</td><td>' + value[1][2].toFixed(2) + '</tr>');
                })

                // control collapse buttons
                $('#ranking_btn').click(function() {
                    if ($('#ranking_btn i').attr('class') === 'fas fa-chevron-down') {
                        $('#ranking_btn i').attr('class', 'fas fa-chevron-up')
                    } else {
                        $('#ranking_btn i').attr('class', 'fas fa-chevron-down')
                    }
                })
                // control collapse buttons
                $('#hideShow_btn').click(function() {
                    if ($('#hideShow_btn i').attr('class') === 'fas fa-chevron-down') {
                        $('#hideShow_btn i').attr('class', 'fas fa-chevron-up')
                    } else {
                        $('#hideShow_btn i').attr('class', 'fas fa-chevron-down')
                    }
                })
            });
        });
    </script>

</body>

</html>