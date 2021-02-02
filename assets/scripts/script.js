function insertGradesTable(containerID,gradesTable) {
    var container=document.getElementById(containerID);
    container.innerHTML=gradesTable;
}

function getGradesTable(year) {
    var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function () {
        if(this.readyState==4 && this.status==200)
        {
            insertGradesTable("grades-table-container",this.responseText);
        }
    };
    xhr.open("GET","/services/gradesTable.php?year="+year);
    xhr.send();
}