<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { MessageSquareText, Send, Users } from 'lucide-vue-next';
import { dashboard } from '@/routes';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Chat',
                href: '/chat',
            },
        ],
    },
});
</script>

<template>
    <Head title="Chat" />

    <div class="flex h-full flex-1 flex-col gap-6 overflow-hidden p-4">
        <section
            class="grid gap-6 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)]"
        >
            <div
                class="relative overflow-hidden rounded-2xl border border-sidebar-border/70 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 p-6 text-white shadow-lg dark:border-sidebar-border"
            >
                <div
                    class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(59,130,246,0.22),_transparent_36%),radial-gradient(circle_at_bottom_left,_rgba(34,197,94,0.12),_transparent_32%)]"
                />

                <div class="relative flex h-full flex-col gap-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p
                                class="text-xs font-medium uppercase tracking-[0.28em] text-sky-200/80"
                            >
                                Sala general
                            </p>
                            <h1 class="mt-2 text-3xl font-semibold">
                                Chat en vivo para todos los usuarios
                            </h1>
                            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-200/80">
                                Esta será la vista principal del chat público.
                                Más adelante conectaremos Reverb para que los
                                mensajes aparezcan en tiempo real.
                            </p>
                        </div>

                        <div
                            class="hidden rounded-full border border-white/10 bg-white/5 p-3 md:block"
                        >
                            <MessageSquareText class="size-6 text-sky-200" />
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-3">
                        <div
                            class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur"
                        >
                            <Users class="size-5 text-emerald-300" />
                            <p class="mt-3 text-2xl font-semibold">Todos</p>
                            <p class="mt-1 text-sm text-slate-300">
                                Un solo canal público.
                            </p>
                        </div>
                        <div
                            class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur"
                        >
                            <MessageSquareText class="size-5 text-sky-300" />
                            <p class="mt-3 text-2xl font-semibold">General</p>
                            <p class="mt-1 text-sm text-slate-300">
                                Sin salas privadas por ahora.
                            </p>
                        </div>
                        <div
                            class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur"
                        >
                            <Send class="size-5 text-amber-300" />
                            <p class="mt-3 text-2xl font-semibold">Próximo</p>
                            <p class="mt-1 text-sm text-slate-300">
                                Formulario de envío de mensajes.
                            </p>
                        </div>
                    </div>

                    <div class="mt-auto flex items-center justify-between gap-4">
                        <p class="text-sm text-slate-300">
                            Usuario autenticado, canal público `chat`.
                        </p>
                        <Link
                            :href="dashboard()"
                            class="inline-flex items-center rounded-full border border-white/10 bg-white/10 px-4 py-2 text-sm font-medium text-white transition hover:bg-white/15"
                        >
                            Volver al dashboard
                        </Link>
                    </div>
                </div>
            </div>

            <div class="grid min-h-[32rem] gap-4">
                <div
                    class="flex flex-col overflow-hidden rounded-2xl border border-sidebar-border/70 bg-background shadow-sm dark:border-sidebar-border"
                >
                    <div
                        class="flex items-center justify-between border-b border-sidebar-border/70 px-4 py-3 dark:border-sidebar-border"
                    >
                        <div>
                            <p class="text-sm font-medium">Mensajes</p>
                            <p class="text-xs text-muted-foreground">
                                Vista preliminar del hilo compartido
                            </p>
                        </div>
                        <span
                            class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-medium text-emerald-600 dark:text-emerald-400"
                        >
                            En línea
                        </span>
                    </div>

                    <div class="flex flex-1 flex-col gap-3 p-4">
                        <div
                            class="max-w-[85%] rounded-2xl rounded-tl-sm bg-sidebar-accent p-3 text-sm text-sidebar-accent-foreground"
                        >
                            <p class="font-medium">Sistema</p>
                            <p class="mt-1">
                                Aquí mostraremos los mensajes que lleguen por
                                Reverb.
                            </p>
                        </div>
                        <div
                            class="ml-auto max-w-[85%] rounded-2xl rounded-tr-sm bg-primary p-3 text-sm text-primary-foreground"
                        >
                            <p class="font-medium">Tú</p>
                            <p class="mt-1">
                                Esta vista ya está lista para enchufar el chat.
                            </p>
                        </div>
                        <div class="mt-auto rounded-xl border border-dashed border-sidebar-border/70 p-4 text-sm text-muted-foreground dark:border-sidebar-border">
                            <p class="font-medium text-foreground">
                                Área de composición
                            </p>
                            <p class="mt-1">
                                Más adelante agregaremos el input y el botón de
                                enviar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
