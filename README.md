## SMMP

#ERD
```mermaid
erDiagram
          Kurikulum ||--|{ MataKuliah : has
          MataKuliah ||--|{ RPS : has
          RPS ||--|{ CPL : has
          RPS ||--|{ CPMK : has
          RPS ||--|{ Soal : has
          Soal ||--|{ CPMK : implemented
          User ||--|{ RPS : input 

          User {
            int id
            string email
            string password
            string otoritas 
          }
          Kurikulum {
            int id
            int tahun
          }
          MataKuliah {
            string id
            sting nama
            string rumpun
            int semester
            string prasyarat
            int id_kurikulum
          }
          RPS {
            int id
            string judul
            string id_MK
            string tanggal
            string otorisasi
          }
          CPL {
            int id
            int id_RPS
            string aspek
            string keterangan
          }
          CPMK {
            int id
            int id_soal
            int id_RPS
            string indikator
            string tanggal
            string penilaian
            string materi
          }
          Soal {
            int id
            string pertanyaan
            string jawaban
          }
```
[![](https://mermaid.ink/img/pako:eNqVVMtugzAQ_BXL5-YHuLY90UhRo96Qom28BQfbWH4oikj-vUtKKigmoXBBO4N3ZtZ2y_eNQJ5xdC8SSge6MOz3yaOTdVRRs_N5tTq3bA0B8qgkVCxjFfgheYD17PfNdkrrij3-vHl7gK_zu4RtA2pKuFbHS0htFWo0AcWQ-eHRjcVKY2NghZmw2mGFES8wKcY1H5w0JUMNUiURC94fG5f-rQmNkwE8G6KX9DQWiOlqAapoZpcbzKtNKpr666oGNCTpLmo7bvejwlPwPqBLR-LAn8BBSDna1TfHsya6qS0fzSGKqGa87tZ5EglgyhLU_Mw8eDmrr9viC6dFEshNsg94i3USqZGSJYVg7kigI7Bcg2_-mn0gThoha6Ak_h2fRSMVSDBJVANZm0_2esqXj96iIyknmGl2gCN8TkIcU_kT1-jodAu6L6-dCx4q2t0Fz-iTXnMhTrSClL8KSZHw7AuUxycOMTTbk9nzLLiIN1J_5fasyze_v34m)](https://mermaid-js.github.io/mermaid-live-editor/edit#pako:eNqVVMtugzAQ_BXL5-YHuLY90UhRo96Qom28BQfbWH4oikj-vUtKKigmoXBBO4N3ZtZ2y_eNQJ5xdC8SSge6MOz3yaOTdVRRs_N5tTq3bA0B8qgkVCxjFfgheYD17PfNdkrrij3-vHl7gK_zu4RtA2pKuFbHS0htFWo0AcWQ-eHRjcVKY2NghZmw2mGFES8wKcY1H5w0JUMNUiURC94fG5f-rQmNkwE8G6KX9DQWiOlqAapoZpcbzKtNKpr666oGNCTpLmo7bvejwlPwPqBLR-LAn8BBSDna1TfHsya6qS0fzSGKqGa87tZ5EglgyhLU_Mw8eDmrr9viC6dFEshNsg94i3USqZGSJYVg7kigI7Bcg2_-mn0gThoha6Ak_h2fRSMVSDBJVANZm0_2esqXj96iIyknmGl2gCN8TkIcU_kT1-jodAu6L6-dCx4q2t0Fz-iTXnMhTrSClL8KSZHw7AuUxycOMTTbk9nzLLiIN1J_5fasyze_v34m)
