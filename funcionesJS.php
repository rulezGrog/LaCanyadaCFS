<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.6.0/ui-bootstrap-tpls.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-moment/0.10.2/angular-moment.min.js"></script>
<script src="lib/js/angular-datepicker.min.js"></script>
<script src="lib/js/angular-re-captcha.js"></script>

<script>
.controller('formController') {

    $scope.prices = {
        primeraSin: <?php echo $primeraSin; ?>,
        primeraCon: <?php echo $primeraCon; ?>,
        benjaminSin: <?php echo $benjaminSin; ?>,
        benjaminCon: <?php echo $benjaminCon; ?>,
        otrosSin: <?php echo $otrosSin; ?>,
        otrosCon: <?php echo $otrosCon; ?>,
        fraccionado: <?php echo $fraccionado; ?>
    };
    $scope.user = {
        name: "",
        surname: "",
        birthdate: "",
        parentName: "",
        parentSurname: "",
        dni: "",
        typeDir: "",
        direction: "",
        town: "",
        province: "",
        postalCode: "",
        country: " Spain ",
        email: "",
        repemail: "",
        telephone: "",
        antiquity: "",
        inscriptionType: "",
        equipement: "",
        message: "",
        total: "0",
        fracc: "NO",
        bancname: "",
        bancsurname: "",
        bancnum: ""
    };
    $scope.red = {
        redParams: "",
        signature: "",
        Ds_Merchant_Amount: "",
        Ds_Merchant_Currency: "",
        Ds_Merchant_Order: "",
        Ds_Merchant_MerchantCode: "",
        Ds_Merchant_MerchantURL: "",
        Ds_Merchant_MerchantUrlOK: "",
        Ds_Merchant_MerchantUrlKO: "",
        Ds_Merchant_MerchantSignature: "",
        Ds_Merchant_Terminal: "",
        Ds_Merchant_TransactionType: "",
        Ds_Merchant_ConsumerLanguage: ""
    };

    $scope.calcTotal = function() {
        if($scope.user.inscriptionType == "FIRST") {
            if($scope.user.equipement == "SI") {
                $scope.user.total = $scope.prices.primeraCon;
            } else {
                $scope.user.total = $scope.prices.primeraSin;
            }
        } else if($scope.user.inscriptionType == "PRE_BENJ") {
            if($scope.user.equipement == "SI") {
                $scope.user.total = $scope.prices.benjaminCon;
            } else {
                $scope.user.total = $scope.prices.benjaminSin;
            }
        } else if($scope.user.inscriptionType == "OTHER") {
            if($scope.user.equipement == "SI") {
               $scope.user.total = $scope.prices.otrosCon;
            } else {
                $scope.user.total = $scope.prices.otrosSin;
            }
        } else {
            $scope.user.total = "0";
        }
    };

    $scope.setFracc = function() {
        if($scope.user.fracc === true) {
            $scope.user.total = $scope.prices.fraccionado;
        } else {
            $scope.calcTotal();
        }
    };


    $scope.$watch('user.telephone', function() {
        $scope.user.telephone = $scope.user.telephone.replace(/\D/, '');
    });
});

</script>
