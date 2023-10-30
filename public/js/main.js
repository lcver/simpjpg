$(async () => {
    $("#posisi_id").on("change", (e) => {
        // get pegawai
        $.get(`api/pegawai/posisi/${e.target.value}`).then((res) => {
            const data = JSON.parse(res);
            const pegawai = $("#pegawai");
            pegawai.empty();

            if (data.length > 0) {
                data.forEach((e) => {
                    pegawai.append(
                        `<option>pilih pegawai</option>` +
                            `<option value="${e.id}">${e.pegawai}</option>`
                    );
                });

                // area kerja
                $.get(`api/kriteria/posisi/${e.target.value}`).then((res) => {
                    const data = JSON.parse(res);
                    const areakerja = $("#areakerja");
                    areakerja.empty();
                    console.log(areakerja);

                    if (data.length > 0) {
                        data.forEach((e) => {
                            areakerja.append(
                                `<option>pilih kriteria</option>` +
                                    `<option value="${e.id}">${e.kriteria}</option>`
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
})();
