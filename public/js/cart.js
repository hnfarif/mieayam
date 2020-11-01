$(document).ready(function(){

    let barang = [
        ['Mie Ayam Jumbo', 25000],
        ['Mie Ayam Bakso', 15000],
        ['Mie Ayam Spesial', 20000 ]
    ];


    if(localStorage.getItem('cart') == null){
        var cart =[];
    }else{
        cart =  JSON.parse(localStorage.getItem('cart'));
       //-----------^parse the item by getting---^--stored item
    }


    $('.btn_add_1').on('click', function(){

        if(!cart.find( el => el[0] === barang[0][0])){

            cart.push(barang[0])

            localStorage.setItem('cart', JSON.stringify(cart));
            console.log(cart);
            alert('Barang berhasil ditambahkan')

        }else{

            alert('Barang sudah ada di keranjang')
            console.log(cart);
        }
    });

    $('.btn_add_2').on('click', function(){

        if(!cart.find( el => el[0] === barang[1][0])){
            cart.push(barang[1])
            localStorage.setItem('cart', JSON.stringify(cart));
            console.log(cart);
            alert('Barang berhasil ditambahkan')
        }else{

            alert('Barang sudah ada di keranjang')
        }
    });

    $('.btn_add_3').on('click', function(){

        if(!cart.find( el => el[0] === barang[2][0])){
            cart.push(barang[2])

            localStorage.setItem('cart', JSON.stringify(cart));
            console.log(cart);
            alert('Barang berhasil ditambahkan')
        }else{
            alert('Barang sudah ada di keranjang')
        }
    });

    let listbarang = "";


    for(var i = 0; i < cart.length; i++){

        listbarang += '<tr>'+
                            '<td class="product-name">' +
                                '<h2 class="h5 cart-product-title text-black ">'+cart[i][0] +'</h2>'+
                            '</td>'+
                            '<td class="hrg-item-'+i+'">'+ cart[i][1] +'</td>' +
                            '<td>' +
                                '<div class="input-group mb-3" style="max-width: 120px;">' +
                                    '<div class="input-group-prepend" >'+
                                        '<button class="btn btn-outline-primary js-btn-minus btnMinus'+i+'" type="button">&minus;</button>' +
                                    '</div>' +

                                    '<input type="text" class="form-control text-center border mr-0 qty-barang-'+i+'" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">' +

                                    '<div class="input-group-append">'+
                                        '<button class="btn btn-outline-primary js-btn-plus btnTambah'+i+'" type="button">&plus;</button>' +
                                    '</div>' +
                                '</div>' +
                            '</td>' +
                            '<td id="total-'+i+'" ></td>'+
                            '<td><a href="/cart" class="btn btn-primary height-auto btn-sm hapus-'+i+'">X</a></td>' +
                       '</tr>';
    }

    $('.daftar-keranjang').html(listbarang);


    for(var j = 0; j < cart.length; j++){

        btntambah(j);
        btnminus(j);



    }

    let hrgItem = [['1'],['2'],['3']];

    function btntambah(data){

        $('.btnTambah'+data).on('click', function(){

            console.log(('.btnTambah'+data));

            let hrg_brg = $('.hrg-item-'+data).text();
            console.log(hrg_brg);
            let qty_brg = $('.qty-barang-'+data).val();
            console.log(parseInt(qty_brg) + 1);

                $('#total-'+data).text(hrg_brg * (parseInt(qty_brg) + 1));

                hrgItem[data].push(hrg_brg * (parseInt(qty_brg) + 1));

                hrgItem[data].splice(1,2,hrg_brg * (parseInt(qty_brg) + 1));


            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({

                url : '/cart',
                method : 'POST',
                data : {
                    'total' : hrgItem
                },
                success : function(data){
                    $('.total_harga').text(data);
                    $('.total_semua').text(data);
                }

            });

        });

    }

    function btnminus(data){
        $('.btnMinus'+data).on('click', function(){

            let hrg_brg = $('.hrg-item-'+data).text();
            console.log(hrg_brg);
            let qty_brg = $('.qty-barang-'+data).val();
            console.log(parseInt(qty_brg) -1);

            $('#total-'+data).text(hrg_brg * (parseInt(qty_brg) -1));
            hrgItem[data].push(hrg_brg * (parseInt(qty_brg) + 1));
            hrgItem[data].splice(1,2,hrg_brg * (parseInt(qty_brg) - 1));

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({

            url : '/cart',
            method : 'POST',
            data : {
                'total' : hrgItem
            },
            success : function(data){
                $('.total_harga').text(data);
                $('.total_semua').text(data);
            }

        });
            
        });
    }



    $('.hapus-0').on('click', function(){

        cart.splice(0,1);
        localStorage.setItem('cart', JSON.stringify(cart));

    });

    $('.hapus-1').on('click', function(){

        cart.splice(1,1);
        localStorage.setItem('cart', JSON.stringify(cart));

    });

    $('.hapus-2').on('click', function(){

        cart.splice(2,1);
        localStorage.setItem('cart', JSON.stringify(cart));

    });


});
