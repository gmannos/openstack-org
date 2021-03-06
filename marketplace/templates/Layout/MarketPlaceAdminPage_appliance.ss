<% if canAdmin(appliances) %>
<div class="container">
    <div style="clear:both">
        <h1 style="width:50%;float:left;">Appliances - Product Details</h1>
        <a style="overflow:hidden;white-space: nowrap;font-weight:normal;float:right;margin-bottom:50px;text-align:center" class="roundedButton save-appliance" href="#" id="save-appliance">Save</a>
        <a style="overflow:hidden;white-space: nowrap;font-weight:normal;float:right;margin-bottom:50px;text-align:center;margin-right:2%;" class="roundedButton publish-appliance" href="#" id="publish-appliance">Publish</a>
        <% if CurrentAppliance %>
            <a style="overflow:hidden;white-space: nowrap;font-weight:normal;float:right;margin-bottom:50px;text-align:center;margin-right:2%;" class="roundedButton addDeploymentBtn preview-appliance" href="#" >Preview</a>
        <% end_if %>
        <% if CurrentAppliance %>
            <a style="overflow:hidden;white-space: nowrap;font-weight:normal;float:right;margin-bottom:50px;text-align:center;margin-right:2%;" class="roundedButton addDeploymentBtn preview-appliance pdf" href="#" >Download PDF</a>
        <% end_if %>
        <a style="overflow:hidden;white-space: nowrap;font-weight:normal;float:right;margin-bottom:50px;text-align:center;margin-right:2%;" class="roundedButton addDeploymentBtn" href="$Top.Link">&lt;&lt; Back to Products</a>
    </div>
    <% if CurrentAppliance.Published == 0 %>
        <div style="clear:both; color:red">
        THIS VERSION IS NOT CURRENTLY PUBLISHED
        </div>
    <% end_if %>
    <div style="clear:both">
        <fieldset>
        <form id="appliance_form" name="appliance_form">
            <% include MarketPlaceAdminPage_CompanyServiceHeader %><BR>
        </form>
        <% include Components %>
        <% include Hypervisors %>
        <% include GuestOSSupport %>
        <% include Videos %>
        <% include SupportChannels %>
        <% include AdditionalResources %>
        <% include CustomerCaseStudies %>
        </fieldset>
    </div>
    <div class="footer_buttons">
        <a style="overflow:hidden;white-space: nowrap;font-weight:normal;float:right;margin-bottom:50px;text-align:center" class="roundedButton save-appliance" href="#" id="save-appliance2">Save</a>
        <a style="overflow:hidden;white-space: nowrap;font-weight:normal;float:right;margin-bottom:50px;text-align:center;margin-right:2%;" class="roundedButton publish-appliance" href="#" id="publish-appliance">Publish</a>
        <% if CurrentAppliance %>
            <a style="overflow:hidden;white-space: nowrap;font-weight:normal;float:right;margin-bottom:50px;text-align:center;margin-right:2%;" class="roundedButton addDeploymentBtn preview-appliance" href="#" >Preview</a>
        <% end_if %>
        <% if CurrentAppliance %>
            <a style="overflow:hidden;white-space: nowrap;font-weight:normal;float:right;margin-bottom:50px;text-align:center;margin-right:2%;" class="roundedButton addDeploymentBtn preview-appliance pdf" href="#" >Download PDF</a>
        <% end_if %>
        <a style="overflow:hidden;white-space: nowrap;font-weight:normal;float:right;margin-bottom:50px;text-align:center;margin-right:50px;" class="roundedButton addDeploymentBtn" href="$Top.Link">&lt;&lt; Back to Products</a>
    </div>
    <script type="text/javascript">
        <% if CurrentAppliance %>
        var appliance = $CurrentApplianceJson;
        <% end_if %>
        var component_releases = $ReleasesByComponent;
        var listing_url = "{$Top.Link}";
        var product_url = "$Top.Link(appliance)";
    </script>
</div>
<% else %>
    <p>You are not allowed to administer Appliances.</p>
<% end_if %>