$(async () => {
    $("#posisi_id").on("change", (e) => {
        // get pegawai
        $.get(`api/pegawai/posisi/${e.target.value}`).then((res) => {
            const data = JSON.parse(res);
            const pegawai = $("#pegawai");
            pegawai.empty();
            pegawai.append(`<option value="">pilih pegawai</option>`);

            if (data.length > 0) {
                data.forEach((e) => {
                    pegawai.append(
                        `<option value="${e.id}">${e.pegawai}</option>`
                    );
                });

                // area kerja
                $.get(`api/area-kerja/posisi/${e.target.value}`).then((res) => {
                    const data = JSON.parse(res);
                    const areakerja = $("#areakerja");
                    areakerja.empty();
                    areakerja.append(
                        `<option value="">pilih kriteria</option>`
                    );

                    if (data.length > 0) {
                        data.forEach((e) => {
                            areakerja.append(
                                `<option value="${e.id}">${e.gedung}</option>`
                            );
                        });
                    }
                });

                $("#kartukuning").removeClass("hidden");
            } else {
                if (!$("#kartukuning").hasClass("hidden")) {
                    $("#kartukuning").addClass("hidden");
                }
            }
        });
    });

    $("#areakerja").on("change", (e) => {
        // kriteria
        $.get(`api/kriteria/area/${e.target.value}`).then((res) => {
            const data = JSON.parse(res);
            const kriteria = $("#kriteria");
            kriteria.empty();

            if (data.length > 0) {
                data.forEach((e) => {
                    kriteria.append(
                        `<div class="checkbox"><label><input name="kartu_kuning[]" type="checkbox" value="${e.id}">${e.kriteria}</label></div>`
                    );
                });

                $("#kriteria_wrapper").removeClass("hidden");
            } else {
                if (!$("#kriteria_wrapper").hasClass("hidden")) {
                    $("#kriteria_wrapper").addClass("hidden");
                }
            }
        });
    });
})();
