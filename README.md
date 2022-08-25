## SMMP

#ERD
```
erDiagram
          Kurikulum ||--|{ MataKuliah : has
          MataKuliah |o--|{ RPS : has
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
[![](https://mermaid.ink/img/pako:eNqVVMtugzAQ_BXL5-QHuLY90UhRo96Qom3sgoNf8kNRBPn3LiSpoJiEwgXtDN6ZWdsNPRjGaUa5exVQOlCFJr9PHp2oo4yKtO163TZkAwHyKAVUJCMV-CF5gLWmZ39sd1NaV7yt9rJ9f4Jv8oeEnQE5JfTV8RJCWckV14GzIfPTc3dnXsUKbWMghZ6wmmGFIC8QwcY1H5zQJeEKhEwiFrw_GZf-zQTjRABPhuglPY0FYrpagCrq2eUG82qSiqb-uqoGBUm6i8qO211VeAzeB-7SkTjwZ3AQUo729d3xrIluastHc4wsyhmv-02eRALosgQ5PzMPXszq67b4wmmhBHST7APe8jqJ1ByTRYWgH0jAI7Bcgzd_zT4RJzQTNWAS_47Pci0kCNBJVAFam0-2P-XLR2-5QylnmGl2hBN8TUIcU-mKKu7wdDO8L_vOBQ0V7u6CZviJr74gJ1qGyt-YwEho9g3S8xWFGMzurA80Cy7yO-l25d5Ylx98AX4Z)](https://mermaid-js.github.io/mermaid-live-editor/edit#pako:eNqVVMtugzAQ_BXL5-QHuLY90UhRo96Qom3sgoNf8kNRBPn3LiSpoJiEwgXtDN6ZWdsNPRjGaUa5exVQOlCFJr9PHp2oo4yKtO163TZkAwHyKAVUJCMV-CF5gLWmZ39sd1NaV7yt9rJ9f4Jv8oeEnQE5JfTV8RJCWckV14GzIfPTc3dnXsUKbWMghZ6wmmGFIC8QwcY1H5zQJeEKhEwiFrw_GZf-zQTjRABPhuglPY0FYrpagCrq2eUG82qSiqb-uqoGBUm6i8qO211VeAzeB-7SkTjwZ3AQUo729d3xrIluastHc4wsyhmv-02eRALosgQ5PzMPXszq67b4wmmhBHST7APe8jqJ1ByTRYWgH0jAI7Bcgzd_zT4RJzQTNWAS_47Pci0kCNBJVAFam0-2P-XLR2-5QylnmGl2hBN8TUIcU-mKKu7wdDO8L_vOBQ0V7u6CZviJr74gJ1qGyt-YwEho9g3S8xWFGMzurA80Cy7yO-l25d5Ylx98AX4Z)
