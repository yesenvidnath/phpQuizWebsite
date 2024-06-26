
//===========================//
// Admin Dashbord JS - start //
//===========================//

// Function to show the selected tab
function showTab(tabName) {
    // Get all tab content elements
    var tabContents = document.getElementsByClassName("tab-content");
    
    // Hide all tab content
    for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = "none";
    }
    
    // Show the selected tab content
    document.getElementById(tabName).style.display = "block";
    
    // Store the currently active tab in localStorage
    localStorage.setItem('activeTab', tabName);
}
// Initially, check if there's a stored active tab and display it
var storedActiveTab = localStorage.getItem('activeTab');
if (storedActiveTab) {
    showTab(storedActiveTab);
} else {
    // If no stored active tab, display the default tab
    showTab('responses');
}

//===========================//
// Admin Dashbord JS - End //
//===========================//