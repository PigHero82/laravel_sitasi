/*=========================================================================================
	File Name: sweet-alerts.js
	Description: A beautiful replacement for javascript alerts
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: Pixinvent
	Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(document).ready(function () {

  $('#confirm-penelitian').on('click', function () {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Setuju',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        Swal.fire(
          {
            type: "success",
            title: 'Anda berhasil menjadi anggota',
            confirmButtonClass: 'btn btn-success',
          }
        )
      }
    })
  });

  $('#confirm-penelitian-popup').on('click', function () {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Setuju',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        Swal.fire(
          {
            type: "success",
            title: 'Anda berhasil menjadi anggota',
            confirmButtonClass: 'btn btn-success',
          }
        )
      }
    })
  });

  $('#confirm-pengabdian').on('click', function () {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Setuju',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        Swal.fire(
          {
            type: "success",
            title: 'Anda berhasil menjadi anggota',
            confirmButtonClass: 'btn btn-success',
          }
        )
      }
    })
  });

  $('#confirm-pengabdian-popup').on('click', function () {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Setuju',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        Swal.fire(
          {
            type: "success",
            title: 'Anda berhasil menjadi anggota',
            confirmButtonClass: 'btn btn-success',
          }
        )
      }
    })
  });

  $('#decline-penelitian').on('click', function () {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Tidak Setuju',
      confirmButtonClass: 'btn btn-warning',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        Swal.fire(
          {
            type: "error",
            title: 'Anda batal menjadi anggota',
            confirmButtonClass: 'btn btn-success',
          }
        )
      }
    })
  });

  $('#decline-penelitian-popup').on('click', function () {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Tidak Setuju',
      confirmButtonClass: 'btn btn-warning',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        Swal.fire(
          {
            type: "error",
            title: 'Anda batal menjadi anggota',
            confirmButtonClass: 'btn btn-success',
          }
        )
      }
    })
  });

  $('#decline-pengabdian').on('click', function () {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Tidak Setuju',
      confirmButtonClass: 'btn btn-warning',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        Swal.fire(
          {
            type: "error",
            title: 'Anda batal menjadi anggota',
            confirmButtonClass: 'btn btn-success',
          }
        )
      }
    })
  });

  $('#decline-pengabdian-popup').on('click', function () {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Tidak Setuju',
      confirmButtonClass: 'btn btn-warning',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        Swal.fire(
          {
            type: "error",
            title: 'Anda batal menjadi anggota',
            confirmButtonClass: 'btn btn-success',
          }
        )
      }
    })
  });

});
