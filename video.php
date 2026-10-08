<?php
$titulo = 'Video';
include('includes/header.php');

// ID extraído de tu enlace de YouTube Shorts
$youtube_id = "jcklNKvmSgI"; 
?>

<div style="max-width: 800px; margin: 40px auto; padding: 0 20px;">
    <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e0e0e0; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
        
        <!-- Encabezado con estilo VOZ UPVM -->
        <div style="background-color: #004d40; color: #ffffff; padding: 18px 24px;">
            <h3 style="margin: 0; font-family: 'Space Grotesk', sans-serif; font-size: 1.25rem;">Sección de Video</h3>
        </div>

        <!-- Contenedor adaptado para Short (vertical) -->
        <div style="padding: 24px; background-color: #fcfbf9; display: flex; justify-content: center;">
            <div style="width: 100%; max-width: 360px; height: 640px; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                <iframe 
                    src="https://www.youtube.com/embed/<?php echo htmlspecialchars($youtube_id); ?>" 
                    title="Reproductor de YouTube"
                    style="width: 100%; height: 100%; border: 0;"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>

    </div>
</div>

</main>
</body>
</html>