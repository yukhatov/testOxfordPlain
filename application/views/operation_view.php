<h1>Operation</h1>
<br>
<div class="tab-feed">
    <form action="index.php?route=operation/index" id="operation-form">
        <div id="first" class="col-md-3 col-sm-6 col-xs-12">
            <label>First number:</label>
            <input id="operationform-firstnumber" type="text" class="form-control" name="firstNumber">
            <div id="error" class="help-block" style="display: none">Must be within 3-15 digits</div>
        </div>

        <div id="second" class="col-md-3 col-sm-6 col-xs-12 has-error" style="display: none">
            <label>Second number:</label>
            <input id="operationform-secondnumber" type="text" class="form-control" name="secondNumber">
            <div id="error" class="help-block" style="display: none">Must be within 3-15 digits</div>
        </div>

        <div id="third" class="col-md-6 col-sm-6 col-xs-12" style="display: none">
            <label style="width: 100%">Add:</label>
            <input id="button-save" type="submit" class="btn btn-primary" name="change_submit" value="Add" style="width: 30%">
            <label id="label-result">Result:</label>
        </div>
    </form>
</div>

<script src="js/operation.js"></script>
