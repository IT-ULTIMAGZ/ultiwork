!function($) {
    "use strict";

    var FormValidator = function() {
        this.$commentForm = $("#commentForm"), //this could be any form, for example we are specifying the comment form
        this.$signupForm = $("#signupForm"),
        this.$itemForm = $("#itemForm"),
        this.$loginForm = $("#loginForm"),
        this.$petugasForm = $("#petugasForm"),
        this.$petugasEditForm = $("#petugasEditForm"),
        this.$petugasEditPassword = $("#petugasEditPassword"),
        this.$pembelianForm = $("#pembelianForm"),
        this.$penjualanForm = $("#penjualanForm"),
        this.$penjualankrdForm = $("#penjualankrdForm"),
        this.$supplierForm = $("#supplierForm"),
        this.$timbangulangForm = $("#timbangulangForm"),
        this.$customerForm = $("#customerForm");
        this.$penagihanForm = $("#penagihanForm");
    };

    //init
    FormValidator.prototype.init = function() {
        
        // validate the comment form when it is submitted
        this.$commentForm.validate();

        // validate item form on keyup and submit
        this.$itemForm.validate({
            rules: {
                kategori: "required",
                size: "required",
                total_item: "required",
                total_kg: "required",
                kode: "required"
            },
            messages: {
                kategori: "mohon inputkan kategori item",
                size: "mohon inputkan size item",
                total_item: "mohon inputkan total item",
                total_kg: "mohon inputkan total kg item",
                kode: "mohon inputkan kode barang"
            }
        });

        // validate login form on keyup and submit
        this.$loginForm.validate({
            rules: {
                username: "required",
                password: "required"
            },
            messages: {
                username: "username tidak boleh kosong",
                password: "password tidak boleh kosong"
            }
        });

        // validate edit petugas form on keyup and submit
        this.$petugasEditForm.validate({
            rules: {
                nama: "required",
                jk: "required",
                alamat: "required",
                notelp: "required",
                username: "required",
                level: "required"
            },
            messages: {
                kategori: "mohon inputkan kategori item",
                nama: "mohon inputkan nama petugas",
                jk: "mohon inputkan jk petugas",
                alamat: "mohon inputkan alamat petugas",
                notelp: "mohon inputkan no telp petugas",
                username: "mohon inputkan username petugas",
                level: "mohon inputkan level petugas"
            }
        });

        // validate petugas form on keyup and submit
        this.$petugasForm.validate({
            rules: {
                nama: "required",
                jk: "required",
                alamat: "required",
                notelp: "required",
                username: "required",
                password: "required",
                level: "required"
            },
            messages: {
                kategori: "mohon inputkan kategori item",
                nama: "mohon inputkan nama petugas",
                jk: "mohon inputkan jk petugas",
                alamat: "mohon inputkan alamat petugas",
                notelp: "mohon inputkan no telp petugas",
                username: "mohon inputkan username petugas",
                password: "mohon inputkan password petugas",
                level: "mohon inputkan level petugas"
            }
        });

        // validate edit password petugas form on keyup and submit
        this.$petugasEditPassword.validate({
            rules: {
                password: "required"
            },
            messages: {
                password: "mohon inputkan password petugas"
            }
        });

        // validate pembelian form on keyup and submit
        this.$pembelianForm.validate({
            rules: {
                kode: "required",
                kategori: "required",
                jumlah_pembelian: "required",
                harga_pembelian: "required"
            },
            messages: {
                kode: "mohon inputkan 'id transaksi pembelian' pembelian",
                kategori: "mohon inputkan 'item' pembelian",
                jumlah_pembelian: "mohon inputkan 'jumlah' pembelian",
                harga_pembelian: "mohon inputkan 'harga' pembelian"
            }
        });

        // validate pembelian form on keyup and submit
        this.$penjualanForm.validate({
            rules: {
                kode: "required",
                jumlah_penjualan: "required",
                harga_jual: "required"
            },
            messages: {
                kode: "mohon pilih 'kode' pembelian",
                jumlah_penjualan: "mohon inputkan 'jumlah jual' penjualan",
                harga_jual: "mohon inputkan 'harga jual' penjualan"
            }
        });

        // validate pembelian form on keyup and submit
        this.$penjualankrdForm.validate({
            rules: {
                customer: "required",
                kode: "required",
                kategori: "required",
                jumlah_penjualan: "required",
                harga_jual: "required",
                dibayar: "required"
            },
            messages: {
                customer: "mohon pilih customer",
                kode: "mohon pilih 'kode' pembelian",
                kategori: "mohon pilih item penjualan",
                jumlah_penjualan: "mohon inputkan 'jumlah jual' penjualan",
                harga_jual: "mohon inputkan 'harga jual' penjualan",
                dibayar: "mohon inputkan pembayaran pertama"
            }
        });

        // validate supplier form on keyup and submit
        this.$supplierForm.validate({
            rules: {
                nama: "required",
                alamat: "required",
                kontak: "required",
                produk: "required"
            },
            messages: {
                nama: "mohon inputkan nama supplier",
                alamat: "mohon inputkan alamat supplier",
                kontak: "mohon inputkan kontak supplier",
                produk: "mohon inputkan produk supplier"
            }
        });

        // validate timbang ulang form on keyup and submit
        this.$timbangulangForm.validate({
            rules: {
                namakandang: "required",
                nomormobil: "required",
                tanggaldatang: "required",
                jumlahekor: "required",
                jumlahkg: "required",
                jumlahekormati: "required",
                jumlahkgmati: "required"
            },
            messages: {
                namakandang: "mohon inputkan nama kandang",
                nomormobil: "mohon inputkan nomor mobil",
                tanggaldatang: "mohon inputkan tanggal datang",
                jumlahekor: "mohon inputkan jumlah ekor",
                jumlahkg: "mohon inputkan jumlah kg",
                jumlahekormati: "mohon inputkan jumlah ekor mati",
                jumlahkgmati: "mohon inputkan jumlah kg mati"
            }
        });

        // validate customer form on keyup and submit
        this.$customerForm.validate({
            rules: {
                nama: "required",
                alamat: "required",
                notelp: "required",
                jk: "required"
            },
            messages: {
                nama: "mohon inputkan nama customer",
                alamat: "mohon inputkan alamat customer",
                notelp: "mohon inputkan kontak customer",
                jk: "mohon pilih jk customer"
            }
        });

        // validate customer form on keyup and submit
        this.$penagihanForm.validate({
            rules: {
                nopenjualan: "required",
                dibayar: "required"
            },
            messages: {
                nopenjualan: "mohon inputkan id transaksi",
                dibayar: "mohon inputkan nominal pembayaran"
            }
        });


        // validate signup form on keyup and submit
        this.$signupForm.validate({
            rules: {
                firstname: "required",
                lastname: "required",
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
                agree: "Please accept our policy"
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });

    },
    //init
    $.FormValidator = new FormValidator, $.FormValidator.Constructor = FormValidator
}(window.jQuery),


//initializing 
function($) {
    "use strict";
    $.FormValidator.init()
}(window.jQuery);