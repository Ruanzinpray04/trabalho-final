

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `valor` float NOT NULL,
  `imagem` varchar(400) NOT NULL,
  `estoque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `produtos` (`id`, `id_categoria`, `nome`, `descricao`, `valor`, `imagem`, `estoque`) VALUES
(2, 0, 'FONTE GAMER AZZA 650W', 'PSAZ-650W-ARGB,  650W, 80PLUS® Bronze, AC universal de 100V-240V / 200V-240V, 	120 mm: Operação silenciosa em uma ampla gama de cargas,	1 x Conector (20+4)pin ATX 1 x Conector EPS(CPU) 8 Pin (4+4) 2 x Conectores PCI-E 8 Pin (6+2) 5 x Conectores SATA 2 x Conectores Molex 1 x Conector Floppy 1 x Conector Endereçável RGB,  86 x 150 x 140 mm', 269, 'img/fonte.jpg', 55),
(3, 0, 'HEADSET GAMER REDRAGON ZEUS X', 'Marca:	Redragon Modelo:	H510WP-RGB Características:	Iluminação RGB Redragon Chroma Mk.II com 4 efeitos. Almofadas e revestimento interno do arco em tecido para proporcionar o máximo de conforto. Som estéreo e Surround 7.1 Virtual de alta qualidade pelos drivers de 53mm. Microfone com redução de ruído de fundo para captação clara e limpa. Controladora integrada para maior praticidade durante o uso. Compatível com software para ajustes e configurações personalizadas como equalização e controle de ', 319, 'img/h510.jpg', 65),
(4, 0, 'PROCESSADOR AMD RYZEN 7 ', 'O AMD Ryzen™ 7 5800X3D é o primeiro processador para desktop com cache L3 empilhado, oferecendo 96 MB incomparáveis ​​de cache L3 emparelhado com núcleos incrivelmente rápidos para criar o processador para desktop para jogos mais rápido do mundo.1', 2549, 'img/img1.jpg', 44),
(5, 0, 'MONITOR GAMER MANCER VALAK', 'Curvo R1650 Possui uma tela curva R1650, para aumentar a sensação de cobertura e imersão.   Taxa de atualização Conta com uma incrível taxa de atualização de 180Hz, deixando suas partidas muito mais fluídas.   Tempo de resposta Possui 1ms de tempo de resposta, para entregar maior benefício em gêneros de jogos de movimento rápidos.   Ângulo de visão Conta com ângulo de visão horizontal/vertical de 178º/178º (CR>10).   VESA Tamanho do padrão VESA (WxH) 100 x 100 mm.   Conexões Contando com 1 x HDM', 1379, 'img/monitor.jpg', 55),
(6, 0, ' MEMORIA TEAM GROUP T-FORCE', 'Marca:	Team Group Modelo:	TLPRD48G3600HC18J01 Tipo:	DDR4 Capacidade:	8GB (1 x 8GB) Frequência:	3600 MHz Latência:	18 Tensão:	1,35V Dissipador de calor:	Alumínio Dimensões:	32 x 140 x 7 mm', 369, 'img/ram.jpg', 77),
(7, 0, 'PLACA DE VIDEO PCYES RADEON RX 550', 'Marca:	PCYES Modelo:	PJRX550DR5128B GPU:	RX 550 4GB Núcleos CUDA:	512 shaders Clock:	Base: 1183 MHz Clock de memoria:	1502 MHz Tipo de memória:	GDDR5 Memória:	4 GB Interface de memória:	128 Bits Entradas:	1 x HDMI 1 x Display port 1 x DVI Largura de banda da memória:	96 gb/s OpenGL:	4.6 Padrão de barramento:	PCIe x8 3.0', 769, 'img/rx550.jpg', 66),
(8, 0, 'WATER COOLER NZXT KRAKEN', 'Marca:	NZXT Modelo:	RL-KRX53-01 Soquete:	Intel: LGA 1151, 1150, 1155, 1156, 1366, 2011, 2011-3, 2066 Intel Core i9 / Core i7 / Core i5 / Core i3 / Pentium / Celeron  AMD: AM4, sTRX4 *, TR4 * (* o suporte Threadripper não incluído) AMD Ryzen 7 / Ryzen 5 / Ryzen 3 / Ryzen 9 / Threadripper Bloco de água Dimensões:	80 x 80 x 55 mm Material:	Bloco: Cobre Carcaça: Plástico Velocidade e potência da bomba:	800-2.800 + 300 RPM, 12V DC, 0,3A Radiador Dimensões:	123 x 275 x 30 mm Material:	Alumínio Tubo Co', 979, 'img/water.jpg', 49),
(9, 0, 'PLACA MAE ASROCK X570S', 'Marca:	ASRock Modelo:	X570S PG RIPTIDE Característica única:	ASRock USB 3.2 Gen2 - Painel frontal ASRock USB 3.2 Gen2 Tipo-C Header (10 Gb/s) - Porta ASRock USB 3.2 Gen2 Tipo A (10 Gb/s) - Porta ASRock USB 3.2 Gen2 Tipo-C (10 Gb/s) ASRock Super Alloy - Dissipador de calor de liga de alumínio XXL - Choke de potência premium 60A - 50A Dr.MOS - Choke de liga de memória premium (reduz a perda de núcleo de 70% em comparação com o afogador de pó de ferro) - PCB preto fosco - PCB de tecido de vidro de ', 1599, 'img/x570.jpg', 87);


ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;
