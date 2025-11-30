<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Education;
use App\Models\Certificate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Profile Data
        Profile::create([
            'name' => 'MOCH. FAREL ISLAMI AKBAR',
            'title' => 'Siswa Teknik Komputer dan Jaringan',
            'tagline' => 'Network Infrastructure Designer & Front-end Developer',
            'bio' => 'Seorang yang mahir dalam merancang desain infrastruktur jaringan, membangun topologi jaringan, dan membuat front-end. Sebagai pelajar di SMK Negeri 2 Surabaya, saya mengambil jurusan Teknik Komputer dan Jaringan (TKJ).

Ketertarikan saya terletak pada desain infrastruktur jaringan dan pengembangan front-end dengan bantuan Cisco Packet Tracer, VS Code, dan Google Antigravity. Saya juga mahir membangun topologi jaringan.

Selain itu, saya terbiasa berperan sebagai co-leader dalam tim melalui proyek sekolah. Saya memiliki kemampuan dalam risk management, rasa tanggung jawab, disiplin, dan siap mendukung proyek yang diberikan. Termotivasi untuk berkontribusi sebagai peserta PKL (Praktik Kerja Lapangan) dengan semangat belajar cepat (fast learning) dan sikap profesional.',
            'education' => 'SMK Negeri 2 Surabaya - Teknik Komputer dan Jaringan (TKJ)',
            'phone' => '0878-1201-8882',
            'email' => 'Moch.farelislamiakbar.31@gmail.com',
            'address' => 'Jalan Pesapen Barat, Surabaya, Indonesia',
        ]);

        // Skills Data - Jaringan
        Skill::create([
            'name' => 'Cisco Packet Tracer',
            'category' => 'Jaringan',
            'level' => 85,
            'icon' => '🌐',
        ]);

        Skill::create([
            'name' => 'MikroTik Configuration',
            'category' => 'Jaringan',
            'level' => 80,
            'icon' => '⚙️',
        ]);

        Skill::create([
            'name' => 'VLAN & Routing',
            'category' => 'Jaringan',
            'level' => 85,
            'icon' => '🔀',
        ]);

        Skill::create([
            'name' => 'Network Security',
            'category' => 'Jaringan',
            'level' => 75,
            'icon' => '🔒',
        ]);

        // Skills Data - Frontend
        Skill::create([
            'name' => 'HTML5',
            'category' => 'Frontend',
            'level' => 90,
            'icon' => 'devicon-html5-plain colored',
        ]);

        Skill::create([
            'name' => 'CSS3',
            'category' => 'Frontend',
            'level' => 90,
            'icon' => 'devicon-css3-plain colored',
        ]);

        Skill::create([
            'name' => 'JavaScript',
            'category' => 'Frontend',
            'level' => 85,
            'icon' => 'devicon-javascript-plain colored',
        ]);

        Skill::create([
            'name' => 'React JS',
            'category' => 'Frontend',
            'level' => 75,
            'icon' => 'devicon-react-original colored',
        ]);

        Skill::create([
            'name' => 'Vite',
            'category' => 'Frontend',
            'level' => 80,
            'icon' => 'devicon-vitejs-plain colored',
        ]);

        // Skills Data - Backend
        Skill::create([
            'name' => 'PHP',
            'category' => 'Backend',
            'level' => 80,
            'icon' => 'devicon-php-plain colored',
        ]);

        Skill::create([
            'name' => 'Laravel',
            'category' => 'Backend',
            'level' => 85,
            'icon' => 'devicon-laravel-original colored',
        ]);

        Skill::create([
            'name' => 'Node JS',
            'category' => 'Backend',
            'level' => 70,
            'icon' => 'devicon-nodejs-plain-wordmark colored',
        ]);

        Skill::create([
            'name' => 'MySQL',
            'category' => 'Backend',
            'level' => 80,
            'icon' => 'devicon-mysql-plain colored',
        ]);

        // Skills Data - Soft Skills
        Skill::create([
            'name' => 'Analytical Skill',
            'category' => 'Soft Skill',
            'level' => 85,
            'icon' => '🔍',
        ]);

        Skill::create([
            'name' => 'Risk Management',
            'category' => 'Soft Skill',
            'level' => 80,
            'icon' => '⚖️',
        ]);

        Skill::create([
            'name' => 'Teamwork',
            'category' => 'Soft Skill',
            'level' => 90,
            'icon' => '🤝',
        ]);

        Skill::create([
            'name' => 'Administration',
            'category' => 'Soft Skill',
            'level' => 85,
            'icon' => '📋',
        ]);

        Skill::create([
            'name' => 'Reliable',
            'category' => 'Soft Skill',
            'level' => 90,
            'icon' => '✅',
        ]);

        Skill::create([
            'name' => 'Creative',
            'category' => 'Soft Skill',
            'level' => 85,
            'icon' => '💡',
        ]);

        Skill::create([
            'name' => 'Problem Solving',
            'category' => 'Soft Skill',
            'level' => 85,
            'icon' => '🧩',
        ]);

        Skill::create([
            'name' => 'Time Management',
            'category' => 'Soft Skill',
            'level' => 80,
            'icon' => '⏰',
        ]);

        // Projects Data
        Project::create([
            'title' => 'Simulasi Jaringan Kompleks Multi-Departemen',
            'description' => '
                <p>Proyek ini dirancang untuk mensimulasikan lingkungan jaringan perusahaan nyata yang terdiri dari beberapa divisi, dengan kebutuhan routing dinamis, kontrol akses, segmentasi VLAN, serta penyediaan layanan server (DHCP, DNS, Email, Web).</p>
                
                <h4 class="mt-4 mb-2 font-bold text-lg text-gray-800">Tujuan Utama:</h4>
                <ul class="list-disc pl-5 mb-4">
                    <li>Menerapkan konsep routing dinamis (RIP, OSPF) dan statis secara bersamaan.</li>
                    <li>Mengimplementasikan keamanan jaringan melalui Access Control List (ACL).</li>
                    <li>Menyediakan layanan server terpusat dan terdistribusi.</li>
                    <li>Memastikan isolasi lalu lintas antar divisi menggunakan VLAN dan VTP.</li>
                    <li>Mengujicoba koneksi end-to-end dengan kondisi pembatasan akses.</li>
                </ul>

                <h4 class="mt-4 mb-2 font-bold text-lg text-gray-800">🖥️ 2. Arsitektur Jaringan</h4>
                <p><strong>🔹 Topologi 3 Router Utama:</strong></p>
                <ul class="list-disc pl-5 mb-2">
                    <li><strong>Router1:</strong> Menggunakan RIP sebagai protokol routing.</li>
                    <li><strong>Router2:</strong> Menggunakan OSPF Area 0.</li>
                    <li><strong>Router3:</strong> Konfigurasi static route untuk menghubungkan segmen jaringan yang tidak tercakup oleh routing dinamis.</li>
                </ul>
                <p><strong>🔹 Switch Layer 2 & 3:</strong></p>
                <ul class="list-disc pl-5 mb-2">
                    <li><strong>Switch24TT:</strong> Konfigurasi VLAN mode access untuk PC klien dan trunk untuk interkoneksi.</li>
                    <li><strong>VTP:</strong> Konfigurasi mode server, transparent, dan client untuk manajemen VLAN terpusat.</li>
                </ul>
                <p><strong>🔹 Server & Client:</strong></p>
                <ul class="list-disc pl-5 mb-4">
                    <li><strong>Server:</strong> DHCP, DNS, Web, dan Email Server terintegrasi.</li>
                    <li><strong>Client:</strong> PC, Laptop (VLAN 10, 20, 30), dan IP Phone (VLAN VoIP).</li>
                </ul>

                <h4 class="mt-4 mb-2 font-bold text-lg text-gray-800">⚙️ 3. Konfigurasi Teknis</h4>
                <ul class="list-disc pl-5 mb-4">
                    <li><strong>Routing:</strong> Kombinasi RIP, OSPF (Area 0), dan Static Route.</li>
                    <li><strong>NAT:</strong> Konfigurasi NAT Overload (PAT) untuk akses internet satu IP publik.</li>
                    <li><strong>ACL (Access Control List):</strong>
                        <ul class="list-circle pl-5 mt-1">
                            <li>ACL 1: Client A -> Server (Ping OK, Web Blocked).</li>
                            <li>ACL 2: Client B -> Server (Web OK, Ping Blocked).</li>
                        </ul>
                    </li>
                    <li><strong>VLAN & VTP:</strong> Implementasi VLAN Access/Trunk dan VTP Server/Client/Transparent.</li>
                </ul>

                <h4 class="mt-4 mb-2 font-bold text-lg text-gray-800">🧪 4. Pengujian & Hasil</h4>
                <ul class="list-none pl-0 mb-4">
                    <li>✅ Ping Client A ke Server (Berhasil - ICMP Allowed)</li>
                    <li>❌ Akses Web Client A ke Server (Gagal - HTTP Blocked)</li>
                    <li>❌ Ping Client B ke Server (Gagal - ICMP Blocked)</li>
                    <li>✅ Akses Web Client B ke Server (Berhasil - HTTP Allowed)</li>
                    <li>✅ Koneksi antar VLAN & Internet (Berhasil)</li>
                </ul>
            ',
            'technology' => 'Cisco Packet Tracer, MikroTik, VLAN, OSPF, RIP, ACL, NAT, DHCP, DNS',
            'image_path' => '/images/network-simulation.png',
            'url' => null,
        ]);

        Project::create([
            'title' => 'Sistem Manajemen Stok Barang (CRUD Web Application)',
            'description' => 'Mengembangkan aplikasi web berbasis CRUD untuk pencatatan dan pengelolaan stok barang warehouse. Sistem ini memungkinkan pengguna untuk melakukan Create, Read, Update, dan Delete data barang dengan interface yang user-friendly. Aplikasi ini dibangun menggunakan framework modern dengan database relasional untuk memastikan integritas data dan memudahkan monitoring persediaan warehouse secara real-time.',
            'technology' => 'PHP, MySQL, HTML, CSS, JavaScript',
            'image_path' => '/images/inventory-system.png',
            'url' => null,
        ]);

        Project::create([
            'title' => 'Website CV Portofolio',
            'description' => 'Membuat website CV portofolio profesional untuk menampilkan profil, keahlian, proyek, pendidikan, dan sertifikasi. Website ini dirancang dengan desain modern dan responsif menggunakan Laravel framework. Dilengkapi dengan fitur contact form yang terintegrasi dengan email untuk memudahkan komunikasi dengan calon rekruter atau klien.',
            'technology' => 'Laravel, PHP, MySQL, HTML, CSS, JavaScript, Bootstrap',
            'image_path' => '/images/cv-website.png',
            'url' => null,
        ]);

        Project::create([
            'title' => 'Pelatihan Etika dan Sikap Profesional di Dunia Kerja',
            'description' => 'Mengikuti pelatihan sederhana tentang etika dan sikap profesional di dunia kerja/industri. Pelatihan ini mencakup pemahaman tentang komunikasi efektif, teamwork, time management, dan attitude yang diperlukan dalam lingkungan kerja profesional. Pengalaman ini memberikan bekal soft skills yang penting untuk persiapan memasuki dunia industri.',
            'technology' => 'Soft Skills, Professional Ethics, Communication',
            'image_path' => null,
            'url' => null,
        ]);

        Project::create([
            'title' => 'Operasi dan Konfigurasi Perangkat MikroTik',
            'description' => 'Pengalaman dalam mengoperasikan perangkat MikroTik dan wireless router untuk keperluan jaringan. Melakukan konfigurasi dasar hingga advanced seperti setting IP address, DHCP server, wireless security, bandwidth management, dan firewall rules. Praktik langsung ini memberikan pemahaman mendalam tentang implementasi router MikroTik dalam skenario jaringan nyata.',
            'technology' => 'MikroTik RouterOS, Wireless Configuration, Network Management',
            'image_path' => null,
            'url' => null,
        ]);

        Project::create([
            'title' => 'Pendataan dan Analisis Infrastruktur Jaringan',
            'description' => 'Melakukan pendataan dan membaca infrastruktur jaringan yang sudah ada di lingkungan sekolah/organisasi. Kegiatan ini meliputi dokumentasi topologi jaringan, inventarisasi perangkat aktif, analisis konfigurasi yang berjalan, dan identifikasi potensi improvement. Pengalaman ini melatih kemampuan dalam memahami dan mendokumentasikan sistem jaringan yang kompleks.',
            'technology' => 'Network Documentation, Infrastructure Analysis, Network Mapping',
            'image_path' => null,
            'url' => null,
        ]);

        // Education Data
        Education::create([
            'school' => 'SMK Negeri 2 Surabaya',
            'major' => 'Teknik Komputer dan Jaringan (TKJ)',
            'degree' => 'Siswa Aktif - Kompetensi Keahlian: Desain Infrastruktur Jaringan, Desain Front-end untuk Web, Kewirausahaan, MS Office, Database',
            'start_year' => '2024',
            'end_year' => 'Sekarang',
        ]);

        // Certificates Data
        Certificate::create([
            'title' => 'MikroTik Certified Network Associate (MTCNA)',
            'issuer' => 'MikroTik',
            'credential_id' => 'MTCNA-2024-001234',
            'issue_date' => '2024-03-15',
            'expiry_date' => '2027-03-15',
            'description' => 'Sertifikasi resmi MikroTik yang memvalidasi kemampuan dalam konfigurasi dasar router dan switch MikroTik, termasuk routing, firewall, QoS, dan wireless.',
            'image_path' => null,
            'url' => 'https://mikrotik.com/training/certificates',
            'category' => 'Jaringan',
        ]);

        Certificate::create([
            'title' => 'Cisco Certified Network Associate (CCNA)',
            'issuer' => 'Cisco Networking Academy',
            'credential_id' => 'CSCO12345678',
            'issue_date' => '2024-01-20',
            'expiry_date' => '2027-01-20',
            'description' => 'Sertifikasi fundamental dari Cisco yang mencakup konsep jaringan, IP connectivity, IP services, security fundamentals, dan automation.',
            'image_path' => null,
            'url' => 'https://www.cisco.com/c/en/us/training-events/training-certifications/certifications.html',
            'category' => 'Jaringan',
        ]);

        Certificate::create([
            'title' => 'Web Development Fundamentals',
            'issuer' => 'Dicoding Indonesia',
            'credential_id' => 'DICODING-WEB-2023-5678',
            'issue_date' => '2023-11-10',
            'expiry_date' => null,
            'description' => 'Menguasai fundamental pengembangan web modern termasuk HTML5, CSS3, JavaScript ES6+, responsive design, dan best practices dalam web development.',
            'image_path' => null,
            'url' => 'https://www.dicoding.com/certificates',
            'category' => 'Web Development',
        ]);

        Certificate::create([
            'title' => 'Laravel Web Development',
            'issuer' => 'BuildWith Angga',
            'credential_id' => 'BWA-LARAVEL-2024-9012',
            'issue_date' => '2024-02-05',
            'expiry_date' => null,
            'description' => 'Pelatihan intensif pengembangan aplikasi web menggunakan Laravel framework, mencakup MVC architecture, Eloquent ORM, authentication, dan deployment.',
            'image_path' => null,
            'url' => null,
            'category' => 'Web Development',
        ]);

        Certificate::create([
            'title' => 'Network Security Essentials',
            'issuer' => 'Cisco Networking Academy',
            'credential_id' => 'CSCO-SEC-2023-3456',
            'issue_date' => '2023-09-15',
            'expiry_date' => null,
            'description' => 'Memahami konsep keamanan jaringan, termasuk firewall, VPN, IDS/IPS, encryption, dan best practices dalam mengamankan infrastruktur jaringan.',
            'image_path' => null,
            'url' => 'https://www.netacad.com',
            'category' => 'Keamanan',
        ]);

        Certificate::create([
            'title' => 'IT Essentials: PC Hardware and Software',
            'issuer' => 'Cisco Networking Academy',
            'credential_id' => 'CSCO-ITE-2022-7890',
            'issue_date' => '2022-12-01',
            'expiry_date' => null,
            'description' => 'Sertifikasi yang mencakup pengetahuan fundamental tentang hardware komputer, sistem operasi, troubleshooting, dan maintenance.',
            'image_path' => null,
            'url' => 'https://www.netacad.com',
            'category' => 'Umum',
        ]);
    }
}
