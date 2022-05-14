  $(document).ready(function () {

      AOS.init();

      $("#datepicker").datepicker({
          dateFormat: "yy-mm-dd",
          firstDay: 1,
          dayNamesMin: ["Va", "Hé", "Ke", "Sze", "Csü", "Pé", "Szo"],
          monthNames: ["Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December"],
          minDate: 7,
          showMonthAfterYear: true,
          prevText: "Előző",
          nextText: "Következő",
      });
      
     
  });
